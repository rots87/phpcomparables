@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px">Perfil de la empresa comparable {{ $empresa->emp_nombre }}</h3>

<div class="container">
    <div class="row justify-content-center">
        <table class="table-sm table-bordered table-striped col-sm-5">
            <tbody>
                <tr>
                    <th class="col-sm-1">Nombre</th>
                    <td class="col-sm-4">{{ $empresa->emp_nombre }}</td>
                </tr>
                <tr>
                    <th class="col-sm-1">NIT</th>
                    <td class="col-sm-4">{{ $empresa->emp_nit }}</td>
                </tr>
                <tr>
                    <th class="col-sm-1">Expediente</th>
                    <td class="col-sm-4">{{ $empresa->emp_expediente }}</td>
                </tr>
                <tr>
                    <th class="col-sm-1">Giro</th>
                    <td class="col-sm-4">{{ $empresa->emp_giro }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p></p>
    @if ($ef->isEmpty())
        <h4 class="text-center">No existen estados financieros para este comparable</h4>
    @else
    <div class="row justify-content-center">
        <table class="table-sm">
            <thead class="thead-dark">
                <th>Año</th>
                <th>Accion</th>
            </thead>
            <tbody>
                @foreach ($ef as $estado)
                <tr>
                    <td>{{$estado->eco_ejercicio}}</td>
                    <td><a href="{{route('empresacomparable.showef',$estado->eco_id)}}"
                            class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
