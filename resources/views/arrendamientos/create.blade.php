@extends('index')
@section('contenido')
<p>
    <h3 class="text-center">Nuevo Comparable de Arrendamiento</h3>
</p>
<div class="container">
    {!! Form::open(array('route' => 'arrendamientos.store', 'method' => 'POST', 'enctype'=> 'multipart/form-data', 'files' => true)) !!}
    <div class="row justify-content-center form-group">
        <label for="anio" class="col-sm-2 col-form-label">Año a ser evaluado</label>
        <div class="col-sm-6">
            <input type="number" id="anio" name="anio" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="anio" class="col-sm-2 col-form-label">Año a ser evaluado</label>
        <div class="col-sm-6">
            <select name="tipo" id="tipo" class="form-control">
                @foreach ($data as $tipo)
                    <option value="{!! $tipo->id !!}">{!! $tipo->nombre !!}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="mt2" class="col-sm-2 col-form-label">Area en M2</label>
        <div class="col-sm-6">
            <input type="text" id="mt2" name="mt2" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="precio" class="col-sm-2 col-form-label">Precio</label>
        <div class="col-sm-6">
            <input type="text" id="precio" name="precio" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
        <div class="col-sm-6">
            <input type="text" id="direccion" name="direccion" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="municipio" class="col-sm-2 col-form-label">Municipio</label>
        <div class="col-sm-6">
            <input type="text" id="municipio" name="municipio" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
        <div class="col-sm-6">
            <input type="text" id="departamento" name="departamento" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="web" class="col-sm-2 col-form-label">URL del anuncio</label>
        <div class="col-sm-6">
            <input type="url" id="web" name="web" class="form-control" required>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-6">
            <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
        </div>
    </div>
    <div class="row justify-content-end form-group">
        <button type="reset" class="btn btn-sm btn-danger" style="margin: 10px">Limpiar</button>
        <button type="submit" class="btn btn-sm btn-success" style="margin: 10px">Guardar</button>
        <span class="col-sm-2"></span>
    </div>
    {!! Form::close() !!}
</div>
@endsection
