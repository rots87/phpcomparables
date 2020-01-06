<?php

namespace App\Http\Controllers;

use App\modelTipoArrendamiento;
use Illuminate\Http\Request;

class controllerTipoArrendamiento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = modelTipoArrendamiento::get();
        if($data->isEmpty()){
            return view('tipoarrendamiento.create')
                ->withErrors('No existe un registro aún. Por favor ingresa uno');
        }
        return view('tipoarrendamiento.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoarrendamiento.create');
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
            'nombre' => 'unique:tbltipoarrendamiento,tar_nombre|required|max:80'
          ]);
          $data['tar_nombre'] = $request->nombre;
          modelTipoArrendamiento::create($data);
          return redirect()->route('tipoarrendamiento.index')
            ->with('success','Datos almacenados con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelTipoArrendamiento  $modelTipoArrendamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(modelTipoArrendamiento $modelTipoArrendamiento)
    {
        //
    }
}
