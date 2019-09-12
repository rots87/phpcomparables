@extends('index')

@section('contenido')
  <h3 class="text-center" style="margin: 5px;">{{$data['title']}}</h3>
  @if ($data['method']=='POST')
      {!! Form::open(['route' => 'sector.create', 'method' => $data['method'], 'onsubmit' => $data['message']]) !!}
  @else
    {!! Form::open(['route' => ['sector.update',$sector->id], 'method' => $data['method'], 'onsubmit' => $data['message']]) !!}

  @endif

    <div class="container">
        <div class="row justify-content-center form-group">
          <label for="nombre" class="col-sm-2">Nombre del Sector</label>
          <input type="text" class="form-control col-sm-5" name="nombre" id="nombre"
          onkeyup="this.value = this.value.toUpperCase();" required
          @if ($data['method']=='PUT')
            value="{{$sector->nombre}}"
          @endif
          >
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
