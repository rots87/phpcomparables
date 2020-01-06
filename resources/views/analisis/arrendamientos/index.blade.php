@extends('index')
@section('contenido')
<p>
    <h3 class="text-center">Listado de Comparables</h3>
    <h4 class="text-center">Seleccione el año</h4>
</p>
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-sm table-bordered table-hover col-sm-6">
            <thead class="thead-dark text-center">
                <th class="col-sm-6">Año</th>
                <th class="col-sm-3">Numero de Comparables</th>
                <th class="col-sm-3">Acciones</th>
            </thead>
            <tbody>
                @foreach ($data as $arrendamiento)
                <tr>
                    <td>{{ $arrendamiento['anio'] }}</td>
                    <td>{{ $arrendamiento['value'] }}</td>
                    <td>
                        <a href="{{route('analisis.showArrendamientos',$arrendamiento['anio'])}}" class="btn btn-sm btn-info"
                            role="button"><i class="fas fa-search"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div class="row justify-content-end">
        <a class="btn btn-primary col-sm-4" href="{{route('arrendamientos.create')}}">
            <i class="fas fa-plus-circle"></i> Añadir nuevo Comparable
        </a>
        <span class="col-sm-3"></span>
    </div> --}}
</div>
@endsection
