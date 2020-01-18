@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px;">Listado total de estudios aceptados por año</h3>
<br>
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>#</th>
                <th>Año</th>
                <th>Total EPT</th>
                <th>Progreso</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($data as $estudios)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{$estudios->ges_anio}}</td>
                    <td>{{$estudios->ges_totalEPT}}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ number_format($estudios->ges_progreso/($estudios->ges_totalEPT*8),2)*100 }}%;"
                                aria-valuenow="{{ ($estudios->ges_progreso/($estudios->ges_totalEPT*8))*100 }}"
                                aria-valuemin="0" aria-valuemax="100">
                                {{ number_format($estudios->ges_progreso/($estudios->ges_totalEPT*8),2)*100 }}%
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <a href="{{route('estudios.show',$estudios->ges_anio)}}" class="btn btn-sm btn-info"
                                role="button"><i class="fas fa-search"></i></a>
                                <a href="{{route('estudios.resume',$estudios->ges_anio)}}" class="btn btn-sm btn-success"
                                    role="button"><i class="fas fa-chart-pie"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
