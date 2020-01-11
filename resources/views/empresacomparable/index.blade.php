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
                @foreach ($data as $comparable)
                <tr>
                    <th>{{ $comparable->emp_id }}</th>
                    <td>{{ $comparable->emp_nombre }}</td>
                    <td>{{ $comparable->emp_nit }}</td>
                    <td>{{ $comparable->emp_expediente }}</td>
                    <td>{{ $comparable->emp_giro }}</td>
                    <td>{{ $comparable->emp_last_ef }}</td>
                    <td>
                        <div class="row">
                            <a href="{{route('empresacomparable.show',$comparable->emp_id)}}"
                                class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a>
                            <a href="{{route('empresacomparable.edit',$comparable->emp_id)}}" class="btn btn-sm btn-warning"
                                title="Editar empresa"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('empresacomparable.nuevoef',$comparable->emp_id)}}"
                                class="btn btn-sm btn-success"><i class="fas fa-dollar-sign"></i></a>
                            {!! Form::open(array('route' => ['empresacomparable.destroy',$comparable->emp_id], 'method' =>
                            'POST')) !!}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-times-circle"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="container">
    <div class="row justify-content-between">
        <div class="col-sm-3">
            <a href="{{route('empresacomparable.nuevoef')}}" class="btn btn-primary btn-sm btn-block" role="button"
                aria-pressed="true">Agregar Nuevo
                EEFF</a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('empresacomparable.create')}}" class="btn btn-success btn-sm btn-block" role="button"
                aria-pressed="true">Agregar Nuevo
                Comparable</a>
        </div>
    </div>
</div>
</div>
@endsection
