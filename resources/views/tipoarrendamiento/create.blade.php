@extends('index')

@section('contenido')
  <h3 class="text-center" style="margin: 5px;">Ingreso de nuevos tipos de arrendamientos</h3>
      {!! Form::open(['route' => 'tipoarrendamiento.store', 'method' => 'POST', 'onsubmit' => '¿Esta seguro que desea agregar el tipo de arrendamiento?']) !!}

    <div class="container">
        <div class="row justify-content-center form-group">
          <label for="nombre" class="col-sm-2">Nombre del Sector</label>
          <input type="text" class="form-control col-sm-5" name="nombre" id="nombre"
          onkeyup="this.value = this.value.toUpperCase();" required>
        </div>
    </div>
    <br>
    <div class="container-fluid">
      <div class="row form-group allign-content-center">
          <button type="submit" class="btn btn-sm btn-success col-sm-2 offset-sm-7" name="button">Guardar</button>
      </div>
    </div>
  {{ Form::close() }}
@endsection
