<?php

namespace App\Http\Controllers;

use App\modelArrendamientos;
use Illuminate\Http\Request;
use App\modelTipoArrendamiento;
use Illuminate\Support\Facades\DB;

class controllerAnalisis extends Controller
{

    public function indexArrendamiento(){
        $data = collect();
        $firstAnio = modelArrendamientos::orderBy('anio','ASC')->first();
        if(empty($firstAnio)){
            return redirect()->route('arrendamientos.create')
            ->withErrors('Aún no ha ingresado ningun arrendamiento');

        }
        for ($i = date('Y'); $i >= $firstAnio->anio; $i--) {
            $data->push(['anio'=>$i,'value'=>modelArrendamientos::where('anio','=',$i)->count()]);
        }
        if ($data->isEmpty()) {
            return redirect()->route('arrendamientos.create')
            ->withErrors('No existe ningun arrendamiento disponible. por favor ingrese uno.');
        } else {
            return view('analisis.arrendamientos.index')
            ->with('data',$data);
        }
    }

    public function showArrendamiento($anio, $filter=null)
    {
        if($filter!=null){
            $data = DB::table('tblarrendamientos')
                        ->join('tbltipoarrendamiento','tblarrendamientos.tipoarrendamiento_id', '=', 'tbltipoarrendamiento.id')
                        ->where('anio','=',$anio)
                        ->where('tipoarrendamiento_id','=',$filter)
                        ->get();
        }else {
            $data = DB::table('tblarrendamientos')
                        ->join('tbltipoarrendamiento','tblarrendamientos.tipoarrendamiento_id', '=', 'tbltipoarrendamiento.id')
                        ->where('anio','=',$anio)
                        ->get();
        }
        $filter = modelTipoArrendamiento::get();

        dd($data);
        return view('analisis.arrendamientos.show')
            ->with('data',$data)
            ->with('filter',$filter)
            ->with('anio',$anio);
    }


    public function analisisArrendamientos(Request $request)
    {
        dd($request);
    }
}
