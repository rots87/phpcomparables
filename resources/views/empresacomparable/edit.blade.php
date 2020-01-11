@extends('index')

@section('contenido')
<p>
    <h3 class="text-center" style="margin: 5px;">Edicion de empresas comparables</h3>
</p>

<div class="container">
    {!! Form::open(array('route' => ['empresacomparable.update',$data->emp_id], 'method' => 'POST')) !!}
    @method('PUT')
    <div class="row justify-content-center form-group">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-6">
            <input type="text" value="{{ $data->emp_nombre }}" name="nombre" id="nombre" class="form-control" onkeyup="this.value = this.value.toUpperCase();" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="giro" class="col-sm-2 col-form-label">Giro</label>
        <div class="col-sm-6">
            <input type="text" value="{{ $data->emp_giro }}" name="giro" id="giro"class="form-control" onkeyup="this.value = this.value.toUpperCase();" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="nit" class="col-sm-2 col-form-label">NIT</label>
        <div class="col-sm-6">
            <input type="text" value="{{ $data->emp_nit }}" name="nit" id="nit" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="expediente" class="col-sm-2 col-form-label">Expediente</label>
        <div class="col-sm-6">
            <input type="text" value="{{ $data->emp_expediente }}" name="expediente" id="expediente" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-end col-sm-10">
        <button type="reset" class="btn btn-sm btn-danger" style="margin:5px">Limpiar</button>
        <button type="submit" class="btn btn-sm btn-success" style="margin:5px">Guardar</button>
    </div>
    {!! Form::close() !!}
</div>
@endsection()
