@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px;">Listado de los tipos de Arrendamientos Aceptados</h3>

<div class="container">
    <div class="row justify-content-center">
        <table class="table table-striped col-sm-8">
            <thead class="thead-dark">
                <th style="width: 10%">#</th>
                <th style="width: 70%">Nombre</th>
                <th style="width: 20%">Acciones</th>
            </thead>
            <tbody>
                @foreach ($data as $tarrendamiento)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$tarrendamiento->nombre}}</td>
                    <td>
                        <div class="row justify-content-center">
                            {{ Form::open(['route' => ['tipoarrendamiento.destroy',$tarrendamiento->id], 'method' => 'delete', 'onsubmit' => 'return confirm("¿Esta seguro que desea eliminar el tipo de arrendamiento?")']) }}
                            <button type="submit" class="btn btn-sm btn-danger" name="button"><i
                                    class="fas fa-times-circle"></i></button>
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row justify-content-end col-sm-8 offset-sm-2">
        <div class="">
            <a href="{{route('tipoarrendamiento.create')}}" class="btn btn-outline-success btn-sm" role="button"><i
                    class="fas fa-edit"></i>Nuevo</a>
        </div>

    </div>
</div>
@endsection
