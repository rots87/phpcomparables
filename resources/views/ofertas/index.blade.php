@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px;">Listado de ofertas emitidas</h3>

<div class="container">
    <div class="row justify-content-center">
        <table class="table table-striped col-sm-8">
            <thead class="thead-dark">
                <th style="width: 5%">#</th>
                <th style="width: 40%">Cliente</th>
                <th style="width: 20%">Año</th>
                <th style="width: 15%">Estatus</th>
                <th style="width: 20%">Acciones</th>
            </thead>
            <tbody>
                @foreach ($ofertas as $oferta)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$oferta->cliente_nombre}}</td>
                    <td>{{$oferta->anio}}</td>
                    <td>
                        <h6>
                            @switch($oferta->estatus)
                            @case('ACEPTADA')
                            <span class="badge badge-success">
                                @break
                                @case('RECHAZADA')
                                <span class="badge badge-danger">
                                    @break
                                    @default
                                    <span class="badge badge-primary">
                                        @endswitch
                                        {{$oferta->estatus}}
                                    </span>
                        </h6>
                    </td>
                    <td>
                        <div class="row">
                            <a href="{{route('ofertas.edit',$oferta->id)}}" class="btn btn-sm btn-primary"
                                role="button"><i class="fas fa-edit"></i></a>
                            @if ($oferta->estatus == 'ENVIADA')
                            <a href="{{route('ofertas.aceptar',$oferta->id)}}" class="btn btn-sm btn-success"
                                role="button"><i class="fas fa-check"></i></a>
                            <a href="{{route('ofertas.rechazar',$oferta->id)}}" class="btn btn-sm btn-warning"
                                role="button"><i class="fas fa-ban"></i></a>
                            @endif
                            {{ Form::open(['route' => ['ofertas.destroy',$oferta->id], 'method' => 'delete', 'onsubmit' => 'return confirm("¿Esta seguro que desea eliminar la oferta?")']) }}
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

    <div class="row justify-content-between col-sm-8 offset-sm-2">
        <div class="pagination-sm">
            {{ $ofertas->links() }}
        </div>
        <div class="">
            <a href="{{route('ofertas.create')}}" class="btn btn-outline-success btn-sm" role="button"><i
                    class="fas fa-edit"></i>Nuevo</a>
        </div>

    </div>
</div>
@endsection
