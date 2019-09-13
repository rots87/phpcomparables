@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px;">Listado de clientes</h3>
<div class="container-fluid">
    <table class="table table-striped">
        <thead class="thead-dark">
            <th style="width: 2%">#</th>
            <th style="width: 5%">Estatus</th>
            <th style="width: 20%">Nombre</th>
            <th style="width: 20%">Nombre Corto</th>
            <th style="width: 15%">Giro</th>
            <th style="width: 15%">Actividad Economica</th>
            <th style="width: 5%">Sector</th>
            <th style="width: 8%">Ultimo Año Aceptado</th>
            <th style="width: 10%">Acciones</th>
        </thead>
        <tbody>
            @foreach ($data as $cliente)
            <tr>
                {{-- {!!$x = $x + 1;!!} --}}
                <th>1</th>
                <td class="text-center">@if ($cliente->estatus)
                    <span class="badge badge-pill badge-success"><i class="fas fa-check"></i></span>
                    @else
                    <span class="badge badge-pill badge-secondary"><i class="fas fa-times-circle"></i></span>
                    @endif</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->nombre_corto}}</td>
                <td>{{$cliente->giro}}</td>
                <td>{{$cliente->actividad_economica}}</td>
                <td>{{$cliente->sector_nombre}}</td>
                <td>{{$cliente->anio}}</td>
                <td>
                    <div class="row">
                        <a href="{{route('clientes.show',$cliente->id)}}" class="btn btn-sm btn-info" role="button"><i
                                class="fas fa-search"></i></a>
                        <a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-sm btn-warning"
                            role="button"><i class="fas fa-edit"></i></a>
                        {{ Form::open(['route' => ['clientes.destroy',$cliente->id], 'method' => 'delete', 'onsubmit' => 'return confirm("¿Esta seguro que desea eliminar el cliente? \nEsta accion no puede ser deshecha")']) }}
                        <button type="submit" class="btn btn-sm btn-danger" name="button"><i
                                class="fas fa-times-circle"></i></button>
                        {{Form::close()}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row justify-content-between">
            <div class="pagination-sm">
                {{ $data->appends(['sort' => 'nombre'])->links() }}
            </div>
            <div class="">
                <a href="{{route('clientes.create')}}" class="btn btn-outline-success btn-sm" role="button"><i
                        class="fas fa-edit"></i>Nuevo</a>
            </div>
        </div>
    </div>
</div>
@endsection
