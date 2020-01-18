<?php

namespace App\Http\Controllers;

use App\modelCliente;
use App\modelEstudios;
use App\modelGeneralEstudios;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class controllerEstudios extends Controller
{

    public static $estatus = array(
        'POR ACTUALIZAR', 'ACTUALIZADO', 'EN DESARROLLO', 'EN REVISION INTERNA', 'EN CORRECCION', 'EN REVISION DEL CLIENTE','EN CORRECCION DEL CLIENTE','LISTO PARA IMPRIMIR','ENTREGADO'
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = modelGeneralEstudios::orderby('ges_anio','DESC')->paginate(5);
        return view('estudios.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $anio
     * @return \Illuminate\Http\Response
     */
    public function show($anio)
    {
        $data = modelEstudios::where('est_anio','=',$anio)->get();
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
        $value = $data->est_progreso;
        $data->est_progreso = $request->progreso - 1;
        $value = $data->est_progreso - $value;
        $general = modelGeneralEstudios::where('ges_anio',$data->est_anio)->first();
        $general->ges_progreso = $general->ges_progreso + $value;
        modelGeneralEstudios::find($general->ges_id)->update($general->toArray());
        modelEstudios::find($id)->update($data->toArray());
        return redirect()->route('estudios.show',$data->est_anio)
          ->with('success','Datos almacenados con exito');
    }

    public function resume($anio) {
        $values = [];
        for($i=0; $i<9;$i++)
        {
            $temp = modelEstudios::where('est_anio', '=', $anio)
                                    ->where('est_progreso','=', $i);
            array_push($values, $temp->count());
        }
        //dd($values);
        return view('estudios.resume')
        ->with('estatus',self::$estatus)
        ->with('valores',$values)
        ->with('anio',$anio);
    }

    public function detail($anio){
        $poractualizar = self::findJoin($anio,0);
        $actualizado = self::findJoin($anio,1);
        $desarrollo = self::findJoin($anio,2);
        $revInterna = self::findJoin($anio,3);
        $correcion1 = self::findJoin($anio,4);
        $revCliente = self::findJoin($anio,5);
        $correccion2 = self::findJoin($anio,6);
        $imprimir = self::findJoin($anio,7);
        $entregado = self::findJoin($anio,8);
        return view('estudios.detail')
            ->with('poractualizar',$poractualizar)
            ->with('actualizado',$actualizado)
            ->with('desarrollo',$desarrollo)
            ->with('revInterna',$revInterna)
            ->with('correcion1',$correcion1)
            ->with('revCliente',$revCliente)
            ->with('correccion2',$correccion2)
            ->with('imprimir',$imprimir)
            ->with('entregado',$entregado);
    }

    private function findJoin($anio, $progreso){
        return DB::table('tblestudios')
            ->join('tblclientes','cliente_id','tblclientes.cli_id')
            ->select('tblestudios.*','tblclientes.cli_nombre')
            ->where('tblestudios.est_anio','=',$anio)
            ->where('tblestudios.est_progreso','=',$progreso)
            ->get();
    }
}
