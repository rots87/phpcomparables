@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 10px">Ingreso de nuevos Clientes</h3>
<br>
@if ($data['method']=='POST')
{!! Form::open(['route' => 'clientes.store', 'method' => $data['method'],  'onsubmit' => $data['message']]) !!}
@else
{!! Form::open() !!}
@endif

<div class="container">
    <div class="row justify-content-center form-group" form-group">
        <label for="nombre" class="col-sm-3">Nombre de la Empresa:</label>
        <input type="text" class="form-control col-sm-5" id="nombre" name="nombre"
            onkeyup="this.value = this.value.toUpperCase();" required>
    </div>
    <div class="row justify-content-center form-group" form-group">
        <label for="nombre_corto" class="col-sm-3">Nombre corto de la Empresa:</label>
        <input type="text" class="form-control col-sm-5" id="nombre_corto" name="nombre_corto"
            onkeyup="this.value = this.value.toUpperCase();">
    </div>
    <div class="row justify-content-center form-group" form-group">
        <label for="sector" class="col-sm-3">Sector economico de la Empresa:</label>
        <select name="sector_id" id="sector_id" class="form-control col-sm-5">
            @foreach ($sector as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="row justify-content-center form-group" form-group">
        <label for="giro" class="col-sm-3">Giro:</label>
        <input type="text" class="form-control col-sm-5" id="giro" name="giro"
            onkeyup="this.value = this.value.toUpperCase();" required>
    </div>
    <div class="row justify-content-center form-group" form-group">
        <label for="actividad_economica" class="col-sm-3">Actividad Economica:</label>
        <input type="text" class="form-control col-sm-5" id="actividad_economica" name="actividad_economica"
            onkeyup="this.value = this.value.toUpperCase();">
    </div>
    <div class="row" form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-sm btn-success col-sm-2 offset-sm-8']) !!}
    </div>
</div>

{!! Form::close() !!}
@endsection
