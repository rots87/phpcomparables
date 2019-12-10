<?php

namespace App\Http\Controllers;

use App\modelEmpresaComparable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class controllerEmpresaComparable extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = modelEmpresaComparable::get();
        if($data->isEmpty()){
            return redirect()->route('empresacomparable.create')
                ->withErrors('Aun no existe ninguna empresa comparable. Por favor ingrese una');
        }
        return view('empresacomparable.index')
            ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresacomparable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|unique:tblempresa,nombre',
            'giro' => 'required|',
            'nit' => 'required|numeric|unique:tblempresa,nit',
            'expediente' => 'required|numeric|unique:tblempresa,expediente',
        ]);
        try {
            modelEmpresaComparable::create($data);
            return redirect()->route('empresacomparable.index')
                ->with('success','Datos almacenados con exito');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors('Hubo un error al procesar la peticion. Intente nuevamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = modelEmpresaComparable::findOrFail($id);
        return view('empresacomparable.edit')
            ->with('data',$data);
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
        $data = $request->validate([
            'nombre' => 'required|unique:tblempresa,nombre,'.$id,
            'giro' => 'required|',
            'nit' => 'required|numeric|unique:tblempresa,nit,'.$id,
            'expediente' => 'required|numeric|unique:tblempresa,expediente,'.$id,
        ]);

        try {
            modelEmpresaComparable::whereId($id)->update($data);
            return redirect()->route('empresacomparable.index')
                ->with('success','Datos almacenados con exito');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors('Hubo un error al procesar la peticion. Intente nuevamente');
        }

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destruyendo datos de '.$id);
    }

    /**
     * Ingresa un nuevo comparable
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function nuevoef($emp=null)
    {
        $empresas = modelEmpresaComparable::get();
        // if(isset($emp)){
        //     $data = modelEmpresaComparable::findOrFail($emp);
        //     dd($data);
        // }else{
        //     dd('hola');
        // }
        return view('empresacomparable.nuevoef')
            ->with('empresas',$empresas)
            ->with('id',$emp);
    }

    /**
     * Metodo para mostrar una vista previa del EF de la empresa comparable
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vistaprevia(Request $request)
    {
        $nombre = modelEmpresaComparable::find($request->empresa_id);
        $data = $request->validate([
            'empresa_id' => 'required',
            'ejercicio' => 'required|numeric',
            'ingresos' => 'required|numeric|min:0',
            'ingresos_financieros' => 'required|numeric|min:0',
            'otros_ingresos' => 'required|numeric|min:0',
            'costo_venta' => 'required|numeric|min:0',
            'gastos_venta' => 'required|numeric|min:0',
            'gastos_admon' => 'required|numeric|min:0',
            'gastos_finan' => 'required|numeric|min:0',
            'otros_gastos' => 'required|numeric|min:0',
            'isr' => 'required|numeric|min:0',
            'reserva_legal' => 'required|numeric|min:0',
            'gnd' => 'required|numeric|min:0',
        ]);
        return view('empresacomparable.vistaprevia')
            ->with('ef',$request)
            ->with('empresa_nombre',$nombre->nombre);
    }

    /**
     * Funcion que se encargara de guardar los EF despues de pasar por la vista previa
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeef(Request $request)
    {
        dd($request);
    }
}
