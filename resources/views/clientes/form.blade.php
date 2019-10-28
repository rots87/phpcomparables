@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 10px">{{$data['title']}}</h3>
<br>
@if ($data['method']=='POST')
{{ Form::open(['route' => 'clientes.store', 'method' => $data['method'], 'onsubmit' => $data['message']]) }}
@else
{{ Form::open(['route' => ['clientes.update', $cliente->id], 'method' => $data['method'], 'onsubmit' => $data['message']]) }}
@endif
<div class="container">
    <div class="row justify-content-center form-group">
        <label for="nombre" class="col-sm-3">Nombre de la Empresa:</label>
        <input type="text" class="form-control col-sm-5" id="nombre" name="nombre"
            onkeyup="this.value = this.value.toUpperCase();" required
            @if ($data['method']=='PUT')
                value='{{$cliente->nombre}}'
            @endif
            >
    </div>
    <div class="row justify-content-center form-group">
        <label for="nombre_corto" class="col-sm-3">Nombre corto de la Empresa:</label>
        <input type="text" class="form-control col-sm-5" id="nombre_corto" name="nombre_corto"
            onkeyup="this.value = this.value.toUpperCase();"
            @if ($data['method']=='PUT')
                value='{{$cliente->nombre_corto}}'
            @endif>
    </div>
    <div class="row justify-content-center form-group">
        <label for="sector" class="col-sm-3">Sector economico de la Empresa:</label>
        <select name="sector_id" id="sector_id" class="form-control col-sm-5">
            @foreach ($sector as $item)
            @if ($data['method']=='PUT' && $item->id == $cliente->sector_id)
                <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
            @else
                <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endif

            @endforeach
        </select>
    </div>
    <div class="row justify-content-center form-group">
        <label for="giro" class="col-sm-3">Giro:</label>
        <input type="text" class="form-control col-sm-5" id="giro" name="giro"
            onkeyup="this.value = this.value.toUpperCase();" required
            @if ($data['method']=='PUT')
                value='{{$cliente->giro}}'
            @endif
            >
    </div>
    <div class="row justify-content-center form-group"">
        <label for="actividad_economica" class="col-sm-3">Actividad Economica:</label>
        <input type="text" class="form-control col-sm-5" id="actividad_economica" name="actividad_economica"
            onkeyup="this.value = this.value.toUpperCase();"
            @if ($data['method']=='PUT')
                value='{{$cliente->actividad_economica}}'
            @endif
            >
    </div>
    <div class="row form-group">
        <button type="submit" class="btn btn-sm btn-success col-sm-2 offset-sm-8" name="button">Guardar</button>
    </div>
</div>

{!! Form::close() !!}
@endsection
