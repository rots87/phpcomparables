<?php

namespace App\Http\Controllers;

use App\modelCliente;
use App\modelEstudios;
use App\modelGeneralEstudios;
use App\modelOferta;
use Illuminate\Http\Request;


class controllerOfertas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(modelCliente::first()==null) {
            return redirect()->route('clientes.create')
                ->withErrors('No existen clientes en la base de datos');
        }
        $ofertas = modelOferta::orderBy('ofe_anio','desc')
            ->paginate(15);
        return view('ofertas.index', compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = modelCliente::orderby('cli_nombre')->get();
        $data = array(
            'title' => 'Ingreso de una nueva Oferta',
            'message' => 'return confirm("¿Esta seguro que desea guardar la oferta?")',
            'method' => 'POST',
          );
        return view('ofertas.form', compact('clientes','data'));
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
            'cliente_id' => 'required',
            'anio' => 'required',
        ]);
        $data = modelOferta::where('cliente_id',$request->cliente_id)
                        ->where('ofe_anio',$request->anio)
                        ->get();
        if($data->isNotEmpty()){
            return back()->withErrors('Ya exite una oferta para ese año y cliente');
        };
        $data = [
            'ofe_anio' => $request->anio,
            'cliente_id' => $request->cliente_id
        ];
        modelOferta::create($data);
        return redirect()->route('ofertas.index')
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
        try {
            $data = modelOferta::findOrFail($id);
            $data->delete();
            $ofertas_cliente = modelOferta::where('cliente_id', '=', $data->cliente_id)
            ->where('ofe_estatus', '=', 'ACEPTADA')
            ->orderby('ofe_anio','desc')
            ->first();
            $cliente = modelCliente::findOrFail($data->cliente_id);
            if (!isset($ofertas_cliente)) {
                $cliente->cli_anio = null;
                $cliente->cli_estatus = false;
            } else {
                $cliente->cli_anio = $ofertas_cliente->ofe_anio;
            }
            modelCliente::where('cli_id', '=', $data->cliente_id)->update($cliente->toarray());
            return redirect()->route('ofertas.index')->with('success', 'Los datos se borraron con exito');
        } catch (\Throwable $th) {
            return redirect()->route('ofertas.index')
                ->withErrors('No se pudo completar la solicitud');
        }

    }

    public function aceptar($id){
        $data = modelOferta::findOrFail($id);
        $data->ofe_estatus = 'ACEPTADA';
        $data2 = modelCliente::findOrFail($data->cliente_id);
        $data2->cli_anio = ($data2->cli_anio < $data->ofe_anio) ? $data->ofe_anio : $data2->cli_anio;
        $data2->cli_estatus = true;
        $data3 = modelGeneralEstudios::where('ges_anio', '=', $data->ofe_anio)->first();
        if ($data3 != null) {
            $data3->ges_totalEPT += + 1;
            $ept = array(
                'cliente_id' => $data->cliente_id,
                'est_anio' => $data->ofe_anio,
                'est_progreso' => 0,
            );
            modelGeneralEstudios::where('ges_id', '=', $data3->ges_id)->update($data3->toArray());
            modelEstudios::create($ept);
        } else {
            $data3 = array(
                'ges_anio' => $data->ofe_anio,
                'ges_totalEPT' => 1,
                'ges_progreso' => 0,
            );
            $ept = array(
                'cliente_id' => $data->cliente_id,
                'est_anio' => $data->ofe_anio,
                'est_progreso' => 0,
            );
            modelGeneralEstudios::create($data3);
            modelEstudios::create($ept);
        }
        modelCliente::where('cli_id', '=', $data->cliente_id)->update($data2->toarray());
        modelOferta::where('ofe_id', '=', $id)->update($data->toarray());
        return redirect()->route('ofertas.index')
          ->with('success','la oferta fue aceptada con exito');
    }

    public function rechazar($id){
        $data = modelOferta::findOrFail($id);
        $data->ofe_estatus = 'RECHAZADA';
        modelOferta::where('ofe_id', '=', $id)->update($data->toarray());
        return redirect()->route('ofertas.index')
          ->with('success','la oferta fue rechazada con exito');
    }
}
