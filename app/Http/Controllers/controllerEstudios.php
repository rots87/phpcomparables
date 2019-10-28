<?php

namespace App\Http\Controllers;

use App\modelCliente;
use App\modelEstudios;
use App\modelGeneralEstudios;
use Illuminate\Http\Request;

class controllerEstudios extends Controller
{

    public static $estatus = [
        '0' => 'POR ACTUALIZAR',
        '1' => 'ACTUALIZADO',
        '2' => 'EN DESARROLLO',
        '3' => 'EN REVISION INTERNA',
        '4' => 'EN CORRECCION',
        '5' => 'EN REVISION DEL CLIENTE',
        '6' => 'EN CORRECCION DEL CLIENTE',
        '7' => 'LISTO PARA IMPRIMIR',
        '8' => 'ENTREGADO',
    ];

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
       //dd($data);
        return view('estudios.show')
            ->with('data',$data)
            ->with('anio',$anio)
            ->with('estatus',self::$estatus);
    }

    /**
     * Efectua los diferentes cambios en el progreso de los estudios
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function progress(Request $request, $id){
        $data = modelEstudios::findOrFail($id);
        $value = $data->progreso;
        $data->progreso = $request->progreso - 1;
        $value = $data->progreso - $value;
        $general = modelGeneralEstudios::where('anio',$data->anio)->first();
        $general->progreso = $general->progreso + $value;
        modelGeneralEstudios::whereId($general->id)->update($general->toArray());
        modelEstudios::whereId($id)->update($data->toArray());
        return redirect()->route('estudios.show',$data->anio)
          ->with('success','Datos almacenados con exito');
    }
}
