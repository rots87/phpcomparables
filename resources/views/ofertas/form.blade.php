@extends('index')

@section('contenido')
<br>
<h3 class="text-center" style="margin: 5px;">{{$data['title']}}</h3>
<br>
@if ($data['method']=='POST')
{!! Form::open(['route' => 'ofertas.store', 'method' => $data['method'], 'onsubmit' => $data['message']]) !!}
@else
{!! Form::open(['route' => ['ofertas.update',$ofertas->id], 'method' => $data['method'], 'onsubmit' => $data['message']]) !!}
@endif

<div class="container">
    <div class="row justify-content-center form-group">
        <label for="cliente" class="col-sm-2">Cliente a ofertar</label>
        <select name="cliente_id" id="cliente_id" class="form-control col-sm-6">
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="row justify-content-center form-group">
        <label for="cliente" class="col-sm-2">Año a Evaluar</label>
        <input type="number" name="anio" id="anio" value="{{date('Y')}}"
        class="form-control col-sm-6" min="2010" max="2099" maxlength="4">
    </div>
</div>
<br>
<div class="container">
    <div class="row form-group">
        <button type="submit" class="btn btn-sm btn-success col-sm-2 offset-sm-8" name="button">Guardar</button>
    </div>
</div>
{{ Form::close() }}
@endsection
