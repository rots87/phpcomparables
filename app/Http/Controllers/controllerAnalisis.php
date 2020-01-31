<?php

namespace App\Http\Controllers;

use App\modelArrendamientos;
use Illuminate\Http\Request;
use App\modelTipoArrendamiento;

class controllerAnalisis extends Controller
{

    public function indexArrendamiento(){
        $data = collect();
        $firstAnio = modelArrendamientos::orderBy('arr_anio','ASC')->first();
        if(empty($firstAnio)){
            return redirect()->route('arrendamientos.create')
            ->withErrors('Aún no ha ingresado ningun arrendamiento');

        }
        for ($i = date('Y'); $i >= $firstAnio->arr_anio; $i--) {
            $data->push(['arr_anio'=>$i,'value'=>modelArrendamientos::where('arr_anio','=',$i)->count()]);
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
        $data = ($filter == null) ?
            modelArrendamientos::all() : modelArrendamientos::where('tipoarrendamiento_id', '=', $filter);
        $filter = modelTipoArrendamiento::get();
        return view('analisis.arrendamientos.show')
            ->with('data',$data)
            ->with('filter',$filter)
            ->with('anio',$anio);
    }


    public function analisisArrendamientos(Request $request)
    {
        $comparables = collect();
        $seleccionados = $request->except('_token','filter');
        foreach($seleccionados as $arrendamiento) {
            $data = modelArrendamientos::find($arrendamiento);
            $comparables->push(['arrendamiento'=>$arrendamiento,'precio'=>$data->arr_precio, 'area'=>$data->arr_mt2]);
        }
        $media = self::media($comparables);
        $mediana = self::mediana($comparables);
        dd($mediana);
        return view('analisis.arrendamientos.analisis', compact('comparables'));

    }

    private function media($comparables)
    {
        return $comparables->sum('precio') / $comparables->count();
    }

    private function mediana($comparables){
        $count = $comparables->count();
        $sorted = $comparables->sortBy('precio');
        $mediana = $count % 2;
        return $mediana;
    }
}
