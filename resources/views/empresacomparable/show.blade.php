@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px">Perfil de la empresa comparable {{ $empresa->nombre }}</h3>

<div class="container">
    <div class="row justify-content-center">
        <table class="table-sm table-bordered table-striped col-sm-5">
            <tbody>
                <tr>
                    <th class="col-sm-1">Nombre</th>
                    <td class="col-sm-4">{{ $empresa->nombre }}</td>
                </tr>
                <tr>
                    <th class="col-sm-1">NIT</th>
                    <td class="col-sm-4">{{ $empresa->nit }}</td>
                </tr>
                <tr>
                    <th class="col-sm-1">Expediente</th>
                    <td class="col-sm-4">{{ $empresa->expediente }}</td>
                </tr>
                <tr>
                    <th class="col-sm-1">Giro</th>
                    <td class="col-sm-4">{{ $empresa->giro }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p></p>
    <div class="row justify-content-center">
        <table class="table-sm">
            <thead class="thead-dark">
                <th>Año</th>
                <th>Accion</th>
            </thead>
            <tbody>
                @foreach ($ef as $estado)
                <tr>
                    <td>{{$estado->ejercicio}}</td>
                    <td><a href="{{route('empresacomparable.showef',$estado->id)}}"
                        class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
