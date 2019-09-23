<?php

namespace App\Http\Controllers;

use App\modelCliente;
use App\modelEstudios;
use App\modelGeneralEstudios;
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
        $data = modelGeneralEstudios::orderby('anio','DESC')->paginate(5);
        return view('estudios.index')
            ->with('data', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $anio
     * @return \Illuminate\Http\Response
     */
    public function show($anio)
    {
        $data = modelEstudios::where('anio','=',$anio)->get();
        foreach ($data as $estudio) {
            $nombre = modelCliente::find($estudio->cliente_id);
            $estudio->cliente_nombre = $nombre->nombre;
        };
        $estatus = array(
            '0' => 'EN MAQUETACION',
            '1' => 'EN PROCESO',
            '2' => 'REVISION INTERNA',
            '3' => 'EN CORRECCION INTERNA',
            '4' => 'REVISION CLIENTE',
            '5' => 'EN CORRECCION CLIENTE',
            '6' => 'EN PROCESO DE IMPRESION',
            '7' => 'ENTREGADO',
        );
        return view('estudios.show')
            ->with('data',$data)
            ->with('anio',$anio)
            ->with('estatus',$estatus);
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
