<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\modelArrendamientos;

class controllerArrendamientos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('arrendamientos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arrendamientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $name = time();
                $file->move(public_path().'/localarr/', $name);
            } else {
                return redirect()->back()->withErrors('existe un error con el archivo adjunto');
            }
            $data = $request->validate([
                'anio' => 'required',
                'mt2' => 'required',
                'precio' => 'required',
                'direccion' => 'required',
                'municipio' => 'required',
                'departamento' => 'required',
                'web' => 'required'
            ]);
            //Arr::add($data, 'tipo', 'local'); TODO: Pendiente de hacer la integracion con el nuevo modelo
            Arr::add($data, 'foto', $name);
            modelArrendamientos::create($data);
            return redirect()->route('arrendamientos.index')
                ->with('success','Datos almacenados con exito');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error al procesar los datos');
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
