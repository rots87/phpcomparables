<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\modelCliente;
use App\modelSector;

class controllerCliente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = modelCliente::paginate(2);
        if($clientes->isNotEmpty()){
        foreach ($clientes as $cliente) {
            $sector = modelSector::select('nombre')->where('id',$cliente->sector_id)->first();
            $cliente = Arr::add($cliente,'sector_nombre', $sector['nombre']);
        }
        return view('clientes.index')
            ->with('data',$clientes);
        } else {
            return redirect()->route('clientes.create')
                ->with('success','No existen clientes aún. Por favor ingrese uno');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Ingreso de un nuevo Cliente',
            'message' => 'return confirm("¿Esta seguro que desea guardar el cliente?")',
            'method' => 'POST',
          );
        $sector = modelSector::orderby('nombre')->get();
        return view('clientes.form')
            ->with('sector',$sector)
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
        $data = $request->validate([
            'nombre' => 'unique:tblclientes,nombre|max: 80|required',
            'sector_id' => 'required',
            'giro' => 'required',
            'actividad_economica' => 'required',
        ]);

        $data = Arr::add($data, 'anio', date('Y'));
        $data = Arr::add($data, 'estatus', false);
        $data = Arr::add($data, 'nombre_corto', $request->nombre_corto);
        modelCliente::create($data);
        return redirect()->route('clientes.index')
          ->with('success','Datos almacenados con exito');
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
}
