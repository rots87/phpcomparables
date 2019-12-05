<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\modelArrendamientos;
use App\modelTipoArrendamiento;
use Illuminate\Support\Facades\Storage;

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
        $firstAnio = modelArrendamientos::orderBy('anio','ASC')->first();
        if($firstAnio==null){
            return view('arrendamientos.create')
            ->withErrors('Aún no ha ingresado ningun arrendamiento');

        }
        for ($i = date('Y'); $i >= $firstAnio->anio; $i--) {
            $data->push(['anio'=>$i,'value'=>modelArrendamientos::where('anio','=',$i)->count()]);
        }
        return view('arrendamientos.index')
            ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = modelTipoArrendamiento::get();
        return view('arrendamientos.create')
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
                $data->foto = $imageName;
                //$request->foto->move(public_path().'/localarr/', $imageName);
                $path = $request->foto->storeAs('localarr', $imageName);
            } else {
                return redirect()->back()->withErrors('existe un error con el archivo adjunto');
            }


            $data->anio = $request->anio;
            $data->tipoarrendamiento_id = $request->tipo;
            $data->mt2 = $request->mt2;
            $data->precio = $request->precio;
            $data->direccion = $request->direccion;
            $data->municipio = $request->municipio;
            $data->departamento = $request->departamento;
            $data->web = $request->web;

            //dd($data);
            $data->save();
            return redirect()->route('arrendamientos.index')
                ->with('success','Datos almacenados con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $anio
     * @return \Illuminate\Http\Response
     */
    public function show($anio, $filter=null)
    {
        if($filter!=null){
            $data = modelArrendamientos::join('tbltipoarrendamiento','tipoarrendamiento_id','tbltipoarrendamiento.id')
                                        ->where('anio','=',$anio)
                                        ->where('tipoarrendamiento_id','=',$filter)
                                        ->get();
        }else {
            $data = modelArrendamientos::join('tbltipoarrendamiento','tipoarrendamiento_id','tbltipoarrendamiento.id')
                                        ->where('anio','=',$anio)
                                        ->get();
        }
        $filter = modelTipoArrendamiento::get();
        return view('arrendamientos.show')
            ->with('data',$data)
            ->with('filter',$filter)
            ->with('anio',$anio);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
