@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 10px">Perfil del cliente: {{$cliente->nombre}}</h3>
<h4 class="text-center" style="margin: 10px">Datos Generales</h4>
<div class="container ">
    <div class='row justify-content-center'>
        <table class="table stripped-table table-hover col-6">
            <tbody>
                <tr>
                    <th class="table-active" style="width:30%">Nombre</th>
                    <td>{{$cliente->cli_nombre}}</td>
                </tr>
                <tr>
                    <th class="table-active" style="width:30%">Nombre Corto</th>
                    <td>{{$cliente->cli_nombre_corto}}</td>
                </tr>
                <tr>
                    <th class="table-active" style="width:30%">Giro</th>
                    <td>{{$cliente->cli_giro}}</td>
                </tr>
                <tr>
                    <th class="table-active" style="width:30%">Actividad Economica</th>
                    <td>{{$cliente->cli_actividad_economica}}</td>
                </tr>
                <tr>
                    <th class="table-active" style="width:30%">Sector</th>
                    <td>{{$cliente->sector_nombre}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h4 class="text-center" style="margin: 10px">Ofertas Enviadas</h4>
@if ($ofertas->isNotEmpty())
<div class="container ">
    <div class='row justify-content-center'>
        <table class="table stripped-table table-hover col-4">
            <thead class="thead-dark text-center">
                <th style="width:50%">Año</th>
                <th style="width:50%">Estado</th>
            </thead>
            <tbody class="text-center">
                @foreach ($ofertas as $oferta)
                <tr>
                    <th>{{$oferta->ofe_anio}}</th>
                    <td>
                        <h5>
                            @switch($oferta->ofe_estatus)
                            @case('ACEPTADA')
                            <span class="badge badge-success">
                                @break
                                @case('RECHAZADA')
                                <span class="badge badge-danger">
                                    @break
                                    @default
                                    <span class="badge badge-primary">
                                        @endswitch
                                        {{$oferta->ofe_estatus}}
                                    </span>
                        </h5>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-sm offset-sm-7">
        {{$ofertas->links()}}
    </div>
</div>
@else
<h5 class="text-center">No se han encontrado ofertas enviadas</h5>
@endif

<h4 class="text-center" style="margin: 10px">Historico</h4>
@if ($historico->isNotEmpty())
<div class="container-fluid">
    <table class="table stripped-table table-hover table-sm ">
        <thead class="thead-dark">
            <th style="width: 5%">#</th>
            <th style="width: 20%">Nombre</th>
            <th style="width: 20%">Nombre Corto</th>
            <th style="width: 15%">Giro</th>
            <th style="width: 15%">Actividad Economica</th>
            <th style="width: 10%">sector</th>
            <th style="width: 15%">Fecha de modificacion</th>
        </thead>
        <tbody>
            @foreach ($historico as $data)
            <tr>
                <td></td>
                <td>{{$data->hcl_nombre}}</td>
                <td>{{$data->hcl_nombre_corto}}</td>
                <td>{{$data->hcl_giro}}</td>
                <td>{{$data->hcl_actividad_economica}}</td>
                <td>{{$data->sec->sec_nombre}}</td>
                <td>{{$data->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@else
<h5 class="text-center">No se han encontrado modificaciones en el Historico</h5>
@endif

@endsection
