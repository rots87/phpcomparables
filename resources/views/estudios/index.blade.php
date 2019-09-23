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
                <th>1</th>
                <td>{{$estudios->anio}}</td>
                <td>{{$estudios->totalEPT}}</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ number_format($estudios->progreso/($estudios->totalEPT*8),2)*100 }}%;"
                            aria-valuenow="{{ ($estudios->progreso/($estudios->totalEPT*8))*100 }}" aria-valuemin="0"
                            aria-valuemax="100">{{ number_format($estudios->progreso/($estudios->totalEPT*8),2)*100 }}%
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <a href="{{route('estudios.show',$estudios->anio)}}" class="btn btn-sm btn-info" role="button"><i
                                class="fas fa-search"></i></a>
                    </div>
                </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
