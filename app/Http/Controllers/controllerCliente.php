<?php

namespace App\Http\Controllers;

use App\modelOferta;
use App\modelSector;
use App\modelCliente;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\modelHistoricoClientes;
use Illuminate\Support\Facades\DB;

class controllerCliente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = modelCliente::join('tblsector','tblclientes.sector_id','=','tblsector.sec_id')
            ->orderBy('cli_nombre','asc')
            ->paginate(20);
        if($clientes->isNotEmpty()){
            return view('clientes.index')
                ->with('data',$clientes);
        } else {
            return redirect()->route('clientes.create')
                ->with('success','No existen clientes aún. Por favor ingrese uno');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Ingreso de un nuevo Cliente',
            'message' => 'return confirm("¿Esta seguro que desea guardar el cliente?")',
            'method' => 'POST',
          );
        $sector = modelSector::where('sec_habilitado','=',true)
            ->orderby('sec_nombre')
            ->get();
        return view('clientes.form')
            ->with('sector',$sector)
            ->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'unique:tblclientes,cli_nombre|max: 80|required',
            'sector_id' => 'required',
            'giro' => 'required',
            'actividad_economica' => 'required',
        ]);
        $data = [
            'cli_nombre' => $request->nombre,
            'sector_id' => $request->sector_id,
            'cli_giro' => $request->giro,
            'cli_actividad_economica' => $request->actividad_economica,
            'cli_estatus'=> false,
            'cli_nombre_corto'=> $request->nombre_corto,
        ];
        // dd($data);
        modelCliente::create($data);
        return redirect()->route('clientes.index')
          ->with('success','Datos almacenados con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = modelCliente::findOrFail($id);
        $sector = modelSector::find($cliente->sector_id);
        $cliente->sector_nombre = $sector->sec_nombre;
        $historico = modelHistoricoClientes::where('cliente_id', '=', $id)->get();
        $ofertas = modelOferta::orderBy('ofe_anio','desc')
            ->where('cliente_id',$id)
            ->paginate(2);
        return view('clientes.perfil')
            ->with('cliente',$cliente)
            ->with('historico',$historico)
            ->with('ofertas',$ofertas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = modelCliente::findOrFail($id);
        $sector = modelSector::find($id);
        $cliente->sector_nombre = $sector->sec_nombre;
        $sector = modelSector::orderby('sec_nombre')->get();
        $data = array(
            'title' => 'Editar Cliente '.$cliente->nombre,
            'message' => 'return confirm("¿Esta seguro que desea editar el cliente? \nEstos cambios se veran reflejados en el historico")',
            'method' => 'PUT',
          );
        return view('clientes.form')
            ->with('sector',$sector)
            ->with('data',$data)
            ->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $cliente = modelCliente::find($id);
        $this->validate($request, [
            'nombre' => 'required|max: 80|unique:tblclientes,cli_nombre,'.$id.',cli_id',
            'sector_id' => 'required',
            'giro' => 'required',
            'actividad_economica' => 'required',
        ]);
        $data = [
            'cli_nombre' => $request->nombre,
            'sector_id' => $request->sector_id,
            'cli_giro' => $request->giro,
            'cli_actividad_economica' => $request->actividad_economica,
            'cli_estatus'=> $cliente->cli_estatus,
            'cli_nombre_corto'=> $request->nombre_corto,
        ];
        self::assing_clientes_to_history($id);
        modelCliente::where('cli_id', '=', $id)->update($data);
        return redirect()->route('clientes.index')
          ->with('success','Datos almacenados con exito');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = modelCliente::findOrFail($id);
      $data -> delete();
      return redirect()->route('clientes.index')->with('success', 'Los datos se borraron con exito');
    }

    /**
     *
     * @param  int  $id
     */
    private function assing_clientes_to_history($id) {
        $cliente = modelCliente::find($id);
        $history = [
            'cliente_id' => $id,
            'hcl_nombre' => $cliente->cli_nombre,
            'hcl_nombre_corto' => $cliente->cli_nombre_corto,
            'hcl_giro' => $cliente->cli_giro,
            'hcl_actividad_economica' => $cliente->cli_actividad_economica,
            'hcl_estatus' => $cliente->cli_estatus,
            'sector_id' => $cliente->sector_id,
        ];
        modelHistoricoClientes::create($history);
    }

}
