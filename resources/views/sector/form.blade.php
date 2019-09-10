@extends('index')

@section('contenido')
  <h3 class="text-center" style="margin: 5px;">{{$data['title']}}</h3>

  {{ Form::open(['route' => 'sector.store', 'method' => 'POST', 'onsubmit' => $data['message']]) }}
    <div class="container">
        <div class="row justify-content-center form-group">
          <label for="nombre" class="col-sm-2">Nombre del Sector</label>
          <input type="text" class="form-control col-sm-5" name="nombre" id="nombre" onkeyup="this.value = this.value.toUpperCase();" required>
        </div>
    </div>
    <br>
    <div class="container-fluid">
      <div class="row form-group">
          <button type="submit" class="btn btn-sm btn-success col-sm-2 offset-sm-7" name="button">Guardar</button>
      </div>
    </div>
  {{ Form::close() }}
@endsection
