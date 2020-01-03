<?php

namespace App\Http\Controllers;

use App\modelEFComparable;
use Illuminate\Http\Request;
use App\modelEmpresaComparable;
use Illuminate\Support\Facades\DB;

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
        $empresa = modelEmpresaComparable::findOrFail($id);
        $ef = modelEFComparable::where('empresa_id','=',$id)
            ->orderBy('ejercicio','desc')
            ->get();
        // dd($empresa->nombre);
        return view('empresacomparable.show')
            ->with('empresa', $empresa)
            ->with('ef', $ef);
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
        if(isset($emp)){
            $data = modelEmpresaComparable::findOrFail($emp);
        }else{
            $data = modelEmpresaComparable::all()->first();
        }
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
        //Actualizacion del EF mas reciente
        $empresa = modelEmpresaComparable::whereId($request->empresa_id)->first();
        $empresa = $empresa->toarray();
        if ($empresa['last_ef'] < $request->ejercicio) {
          DB::table('tblempresa')
            ->where('id', $request->empresa_id)
            ->update(['last_ef' => $request->ejercicio]);
        }
        modelEFComparable::create($request->all());
        return redirect()->route('empresacomparable.index')
                ->with('success','Datos almacenados con exito');
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function showef(int $id){
        $ejercicio = modelEFComparable::findOrFail($id);
        $ejercicioAnt = modelEFComparable::where('ejercicio','=',$ejercicio->ejercicio - 1)->first();
        if(!isset($ejercicioAnt)){
            $ejercicioAnt = new modelEFComparable();
            $ejercicioAnt->ingresos = 0;
            $ejercicioAnt->ingresos_financieros = 0;
            $ejercicioAnt->otros_ingresos = 0;
            $ejercicioAnt->costo_venta = 0;
            $ejercicioAnt->gastos_venta = 0;
            $ejercicioAnt->gastos_admon = 0;
            $ejercicioAnt->gastos_finan = 0;
            $ejercicioAnt->otros_gastos = 0;
            $ejercicioAnt->isr = 0;
            $ejercicioAnt->reserva_legal = 0;
            $ejercicioAnt->gnd = 0;
        }
        $promedio = new modelEFComparable();
        $promedio->ingresos = ($ejercicio->ingresos + $ejercicioAnt->ingresos)/2;
        $promedio->ingresos_financieros = ($ejercicio->ingresos_financieros + $ejercicioAnt->ingresos_financieros)/2;
        $promedio->otros_ingresos = ($ejercicio->otros_ingresos + $ejercicioAnt->otros_ingresos)/2;
        $promedio->costo_venta = ($ejercicio->costo_venta + $ejercicioAnt->costo_venta)/2;
        $promedio->gastos_venta = ($ejercicio->gastos_venta + $ejercicioAnt->gastos_venta)/2;
        $promedio->gastos_admon = ($ejercicio->gastos_admon + $ejercicioAnt->gastos_admon)/2;
        $promedio->gastos_finan = ($ejercicio->gastos_finan + $ejercicioAnt->gastos_finan)/2;
        $promedio->otros_gastos = ($ejercicio->otros_gastos + $ejercicioAnt->otros_gastos)/2;
        $promedio->isr = ($ejercicio->isr + $ejercicioAnt->isr)/2;
        $promedio->reserva_legal = ($ejercicio->reserva_legal + $ejercicioAnt->reserva_legal)/2;
        $promedio->gnd = ($ejercicio->gnd + $ejercicioAnt->gnd)/2;
        //dd(($ejercicio->ingreso + $ejercicioAnt->ingreso)/2);
        return view('empresacomparable.showef')
            ->with('ejercicio', $ejercicio)
            ->with('ejercicioAnt', $ejercicioAnt)
            ->with('promedio', $promedio);
    }
}
