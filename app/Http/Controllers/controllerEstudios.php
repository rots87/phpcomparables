<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerEstudios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Efectua los diferentes cambios en el progreso de los estudios
     *
     * @param int $id
     * @param int $value
     * @return \Illuminate\Http\Response
     */
    public function progress($id, $value){

    }
}
