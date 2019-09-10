<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelSector;


class controllerSector extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = modelSector::orderby('nombre')->paginate(8);
        return view('sector.index')
          ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = array(
        'title' => 'Ingreso de un nuevo Sector',
        'message' => 'return confirm("¿Esta seguro que desea guardar el sector?")',
        'method' => 'POST',
      );
        return view('sector.form')
          ->with('data', $data);
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
          'nombre' => 'unique:tblsector,nombre|required|max:80'
        ]);
        modelSector::create($data);
        return redirect()->route('sector.index')
          ->with('success','Datos almacenados con exito');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //TODO: Pendiente este modulo
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $sector = modelSector::findOrFail($id);
      $data = array(
        'title' => 'Edicion del Sector: ',
        'message' => 'return confirm("¿Esta seguro que desea editar el sector?")',
        'method' => 'PUT',
      );

        return view('sector.form')
          ->with('data', $data)
          ->with('sector', $sector);
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
      $data = $request->validate([
        'nombre' => 'unique:tblsector,nombre|required|max:80'
      ]);
      modelSector::whereId($id)->update($data);
      return redirect()->route('sector.index')
        ->with('success','El sector se ha editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = modelSector::findOrFail($id);
      $data -> delete();
      return redirect()->route('sector.index')->with('success', 'Los datos se borraron con exito');
    }

    /**
     *enable or disable the economic sector. This change can be seen when adding a company or customer
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function flip($id)
    {
      $data = modelSector::findOrFail($id);
      $data->habilitado = !$data->habilitado;
      modelSector::whereId($id)->update($data->toarray());
      if ($data->habilitado) {
        return redirect()->route('sector.index')
          ->with('success','El sector se ha habilitado con exito');
      } else {
        return redirect()->route('sector.index')
          ->with('success','Se ha deshabilitado con exito');
      }

    }
}
