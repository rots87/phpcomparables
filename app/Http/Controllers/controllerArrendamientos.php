<?php

namespace App\Http\Controllers;

use App\modelArrendamientos;
use Illuminate\Http\Request;
use App\modelTipoArrendamiento;
use Illuminate\Support\Facades\DB;

class controllerArrendamientos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = collect();
        $firstAnio = modelArrendamientos::orderBy('arr_anio','ASC')->first();
        if(empty($firstAnio)){
            return redirect()->route('arrendamientos.create')
            ->withErrors('Aún no ha ingresado ningun arrendamiento');

        }
        for ($i = date('Y'); $i >= $firstAnio->arr_anio; $i--) {
            $data->push(['anio'=>$i,'value'=>modelArrendamientos::where('arr_anio','=',$i)->count()]);
        }
        if ($data->isEmpty()) {
            return redirect()->route('arrendamientos.create')
            ->withErrors('No existe ningun arrendamiento disponible. por favor ingrese uno.');
        } else {
            return view('arrendamientos.index',compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = modelTipoArrendamiento::get();
        return view('arrendamientos.create', compact('data'));
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
                'anio' => 'required',
                'mt2' => 'required',
                'precio' => 'required',
                'direccion' => 'required',
                'municipio' => 'required',
                'departamento' => 'required',
                'web' => 'required',
            ]);

            $data = new modelArrendamientos;
            if($request->hasFile('foto')){
                $imageName = (string) time().'.'.$request->file('foto')->getClientOriginalExtension();
                $data->arr_foto = $imageName;
                $path = $request->file('foto')->storeAs('localarr',$imageName);
            } else {
                return redirect()->back()->withErrors('existe un error con el archivo adjunto');
            }
            $data->arr_anio = $request->anio;
            $data->tipoarrendamiento_id = $request->tipo;
            $data->arr_mt2 = $request->mt2;
            $data->arr_precio = $request->precio;
            $data->arr_direccion = $request->direccion;
            $data->arr_municipio = $request->municipio;
            $data->arr_departamento = $request->departamento;
            $data->arr_web = $request->web;
            $data->save();
            return redirect()->route('arrendamientos.index')
                ->with('success','Datos almacenados con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param int $anio
     * @param int $filter
     * @return \Illuminate\Http\Response
     */
    public function show($anio, $filter=null)
    {
        if($filter!=null){
            $data = modelArrendamientos::where('arr_anio','=',$anio)
                ->where('tipoarrendamiento_id','=',$filter)
                ->get();
        }else {
            $data = modelArrendamientos::where('arr_anio','=',$anio)->get();
        }
        $filter = modelTipoArrendamiento::get();
        // dd($data);
        return view('arrendamientos.show',compact('data','filter','anio'));
    }
}
