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
        return view('empresacomparable.index', compact('data'));
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
        $this->validate($request, [
            'nombre' => 'required|unique:tblempresa,emp_nombre',
            'giro' => 'required|',
            'nit' => 'required|numeric|unique:tblempresa,emp_nit',
            'expediente' => 'required|numeric|unique:tblempresa,emp_expediente',
        ]);
        try {
            modelEmpresaComparable::create([
                'emp_nombre' => $request->nombre,
                'emp_giro' => $request->giro,
                'emp_nit' => $request->nit,
                'emp_expediente' => $request->expediente,
            ]);
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
        //dd($empresa);
        $ef = modelEFComparable::where('empresa_id','=',$id)
            ->orderBy('eco_ejercicio','desc')
            ->get();
         return view('empresacomparable.show', compact('empresa','ef'));
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
        return view('empresacomparable.edit',compact('data'));
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
        $this->validate($request, [
            'nombre' => 'required|unique:tblempresa,emp_nombre,'.$id.',emp_id',
            'giro' => 'required|',
            'nit' => 'required|numeric|unique:tblempresa,emp_nit,'.$id.',emp_id',
            'expediente' => 'required|numeric|unique:tblempresa,emp_expediente,'.$id.',emp_id',
        ]);

        try {
            modelEmpresaComparable::find($id)->update([
                'emp_nombre' => $request->nombre,
                'emp_giro' => $request->giro,
                'emp_nit' => $request->nit,
                'emp_expediente' => $request->expediente,
            ]);
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
        //TODO: Pendiente de evaluar si lo implemento o no
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
        if(modelEmpresaComparable::find($emp) == null) {
            $emp = null;
        }
        return view('empresacomparable.nuevoef', compact('empresas','emp'));
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
        $this->validate($request, [
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
            ->with('ef', $request)
            ->with('empresa_nombre', $nombre->nombre);
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
        $empresa = modelEmpresaComparable::find($request->empresa_id)->first();
        $empresa = $empresa->toarray();
        if ($empresa['emp_last_ef'] < $request->eco_ejercicio) {
          DB::table('tblempresa')
            ->where('emp_id', $request->empresa_id)
            ->update(['emp_last_ef' => $request->eco_ejercicio]);
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
        $ejercicioAnt = modelEFComparable::where('eco_ejercicio','=',$ejercicio->eco_ejercicio - 1)->first();
        if(!isset($ejercicioAnt)){
            $ejercicioAnt = new modelEFComparable();
            $ejercicioAnt->eco_ingresos = 0;
            $ejercicioAnt->eco_ingresos_financieros = 0;
            $ejercicioAnt->eco_otros_ingresos = 0;
            $ejercicioAnt->eco_costo_venta = 0;
            $ejercicioAnt->eco_gastos_venta = 0;
            $ejercicioAnt->eco_gastos_admon = 0;
            $ejercicioAnt->eco_gastos_finan = 0;
            $ejercicioAnt->eco_otros_gastos = 0;
            $ejercicioAnt->eco_isr = 0;
            $ejercicioAnt->eco_reserva_legal = 0;
            $ejercicioAnt->eco_gnd = 0;
        }
        $promedio = new modelEFComparable();
        $promedio->eco_ingresos = ($ejercicio->eco_ingresos + $ejercicioAnt->eco_ingresos)/2;
        $promedio->eco_ingresos_financieros = ($ejercicio->eco_ingresos_financieros + $ejercicioAnt->eco_ingresos_financieros)/2;
        $promedio->eco_otros_ingresos = ($ejercicio->eco_otros_ingresos + $ejercicioAnt->eco_otros_ingresos)/2;
        $promedio->eco_costo_venta = ($ejercicio->eco_costo_venta + $ejercicioAnt->eco_costo_venta)/2;
        $promedio->eco_gastos_venta = ($ejercicio->eco_gastos_venta + $ejercicioAnt->eco_gastos_venta)/2;
        $promedio->eco_gastos_admon = ($ejercicio->eco_gastos_admon + $ejercicioAnt->eco_gastos_admon)/2;
        $promedio->eco_gastos_finan = ($ejercicio->eco_gastos_finan + $ejercicioAnt->eco_gastos_finan)/2;
        $promedio->eco_otros_gastos = ($ejercicio->eco_otros_gastos + $ejercicioAnt->eco_otros_gastos)/2;
        $promedio->eco_isr = ($ejercicio->eco_isr + $ejercicioAnt->eco_isr)/2;
        $promedio->eco_reserva_legal = ($ejercicio->eco_reserva_legal + $ejercicioAnt->eco_reserva_legal)/2;
        $promedio->eco_gnd = ($ejercicio->eco_gnd + $ejercicioAnt->eco_gnd)/2;
        //dd(($ejercicio->ingreso + $ejercicioAnt->eco_ingreso)/2);
        return view('empresacomparable.showef',compact('ejercicio','ejercicioAnt','promedio'));
    }
}
