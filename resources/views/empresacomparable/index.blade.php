@extends('index')

@section('contenido')
<p>
    <h3 class="text-center" style="margin: 5px;">Listado de empresas comparables</h3>
</p>
<div class="container">
    <div class="row">
        <table class="table table-sm">
            <thead class="thead-dark">
                <th>#</th>
                <th>Nombre</th>
                <th>NIT</th>
                <th>Expediente</th>
                <th>Giro</th>
                <th>Ultimo EEFF</th>
                <th>Acciones</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<div class="container">
    <div class="row justify-content-between">
        <div class="col-sm-3">
            <a href="{{route('empresacomparable.nuevo_eeff',null)}}" class="btn btn-primary btn-sm btn-block" role="button" aria-pressed="true">Agregar Nuevo
                EEFF</a>
        </div>
        <div class="col-sm-3">
            <a href="" class="btn btn-success btn-sm btn-block" role="button" aria-pressed="true">Agregar Nuevo
                Comparable</a>
        </div>
    </div>
</div>
</div>
@endsection
