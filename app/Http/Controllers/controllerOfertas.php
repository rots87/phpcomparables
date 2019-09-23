<?php

namespace App\Http\Controllers;

use App\modelCliente;
use App\modelEstudios;
use App\modelGeneralEstudios;
use App\modelOferta;
use Illuminate\Http\Request;


class controllerOfertas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = modelCliente::all();
        if($cliente->isEmpty()){
            return redirect()->route('clientes.create')
                ->withErrors('No existen clientes en la base de datos');
        }
        $ofertas = modelOferta::orderBy('anio','desc')
                                //->orderBy('cliente_nombre','desc')
                                ->paginate(15);
        if($ofertas->isEmpty()){
            return redirect()->route('ofertas.create')
                ->withErrors('No hay ofertas ingresadas aun');
        }
        foreach ($ofertas as $oferta) {
            $cliente = modelCliente::find($oferta->cliente_id);
            $oferta->cliente_nombre = $cliente->nombre;
        }

        return view('ofertas.index')
            ->with('ofertas', $ofertas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = modelCliente::orderby('nombre')->get();
        $data = array(
            'title' => 'Ingreso de una nueva Oferta',
            'message' => 'return confirm("¿Esta seguro que desea guardar la oferta?")',
            'method' => 'POST',
          );
        return view('ofertas.form')
            ->with('clientes',$clientes)
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
        $ofertas = modelOferta::all();
        $data = $ofertas->where('cliente_id',$request->cliente_id)
                        ->where('anio',$request->anio);
        if($data->isNotEmpty()){
            return back()->withErrors('Ya exite una oferta para ese año y cliente');
        };
        $data = $request->validate([
            'cliente_id' => 'required',
            'anio' => 'required',
        ]);
        modelOferta::create($data);
        return redirect()->route('ofertas.index')
          ->with('success','Datos almacenados con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = modelOferta::findOrFail($id);
        $data -> delete();
        return redirect()->route('ofertas.index')->with('success', 'Los datos se borraron con exito');
    }

    public function aceptar($id){
        $data = modelOferta::findOrFail($id);
        $data->estatus = 'ACEPTADA';
        $data2 = modelCliente::findOrFail($data->cliente_id);
        $data2->anio = ($data2->anio < $data->anio) ? $data->anio : $data2->anio;
        $data2->estatus = true;
        $data3 = modelGeneralEstudios::where('anio',$data->anio)->first();
        if ($data3 != null) {
            $data3->totalEPT = $data3->totalEPT + 1;
            $ept = array(
                'cliente_id' => $data->cliente_id,
                'anio' => $data->anio,
                'estatus' => 'EN ACTUALIZACION',
            );
            modelGeneralEstudios::whereId($data3->id)->update($data3->toArray());
            modelEstudios::create($ept);
        } else {
            $data3 = array(
                'anio' => $data->anio,
                'totalEPT' => 1,
                'progreso' => 0,
            );
            $ept = array(
                'cliente_id' => $data->cliente_id,
                'anio' => $data->anio,
                'estatus' => 'EN ACTUALIZACION',
            );
            modelGeneralEstudios::create($data3);
            modelEstudios::create($ept);
        }
        modelCliente::whereId($data->cliente_id)->update($data2->toarray());
        modelOferta::whereId($id)->update($data->toarray());
        return redirect()->route('ofertas.index')
          ->with('success','la oferta fue aceptada con exito');
    }

    public function rechazar($id){
        $data = modelOferta::findOrFail($id);
        $data->estatus = 'RECHAZADA';
        modelOferta::whereId($id)->update($data->toarray());
        return redirect()->route('ofertas.index')
          ->with('success','la oferta fue rechazada con exito');
    }
}
