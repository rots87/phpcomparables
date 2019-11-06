@extends('index')
@section('scripts head')
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js'></script>
@endsection
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <canvas id="grafico" name="grafico" height="300"></canvas>
        </div>
        <div class="col-sm-6">
                <h4 class="text-center">Resumen</h4>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Etapa</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($valores as $item)
                            <tr>
                                <td>{{$estatus[$loop->iteration - 1]}}</td>
                                <td>{{ $item }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="row d-print-none">
                    <a href="{{ route('estudios.detail',$anio) }}" class="btn-block btn btn-primary" aria-hidden="true">Ver Detalle</a>
                </div>
        </div>
    </div>
</div>
@endsection

@section('scripts footer')
<script>
    var ctx = document.getElementById('grafico').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo(json_encode($estatus, JSON_PRETTY_PRINT)) ?> ,
            datasets: [{
                label: 'Estudios de Precios',
                data: <?php echo(json_encode($valores, JSON_PRETTY_PRINT)) ?> ,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(51, 255, 102, 0.2)',
                    'rgba(153, 0, 0, 0.2)',
                    'rgba(0, 0, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(51, 255, 102, 1)',
                    'rgba(153, 0, 0, 1)',
                    'rgba(0, 0, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: 'bottom'
            },
            title: {
                display: true,
                text: 'Estatus de EPT <?php echo($anio) ?>'
            }

        }
    });

</script>
@endsection
