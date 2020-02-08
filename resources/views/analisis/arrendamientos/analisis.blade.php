@extends('index')

@section('scripts head')
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js'></script>
<script src="{!! asset('js/app.js') !!}"></script>
<script src="{!! asset('js/cuartil.js') !!}"></script>
@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-between" style="margin: 10px;">
        <button class="btn btn-primary" id="btn-precio" name="btn-precio" onclick="precio() ">Analisis por
            Precio</button>
        <button class="btn btn-primary" id="btn-area" name="btn-area" onclick="area() ">Analisis por Precio/mt2</button>
    </div>
</div>
</p>
{!! Form::hidden('cuenta', $comparables->count(), ['id'=>'cuenta']) !!}
@foreach ($precio as $item)
{!! Form::hidden('precio'.$loop->iteration, $item,['id'=>'precio'.$loop->iteration]) !!}
@endforeach
@foreach ($area as $item)
{!! Form::hidden('area'.$loop->iteration, $item,['id'=>'area'.$loop->iteration]) !!}
@endforeach
@foreach ($comparables as $item)
{!! Form::hidden('nombre'.$loop->iteration, 'Comparable '.$item['arrendamiento'],['id'=>'nombre'.$loop->iteration]) !!}
@endforeach
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <th>Cuartil</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Minimo</td>
                        <td><span id="minimo" name="minimo"></span></td>
                    </tr>
                    <tr>
                        <td>Primer Cuartil</td>
                        <td><span id="primerq" name="primerq"></span></td>
                    </tr>
                    <tr>
                        <td>Segundo Cuartil</td>
                        <td><span id="segundoq" name="segundoq"></span></td>
                    </tr>
                    <tr>
                        <td>Tercer Cuartil</td>
                        <td><span id="tercerq" name="tercerq"></span></td>
                    </tr>
                    <tr>
                        <td>Maximo</td>
                        <td><span id="maximo" name="maximo"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm">
            <canvas id="grafico" name="grafico" ></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <th>Medida</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Media</td>
                        <td><span id="media" name="media"></span></td>
                    </tr>
                    <tr>
                        <td>Mediana</td>
                        <td><span id="median.geo" name="median.geo"></span></td>
                    </tr>
                    <tr>
                        <td>Desviacion Tipica</td>
                        <td><span id="st.dev" name="st.dev"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <th>#</th>
                    <th>Comparable</th>
                    <th><span name="valor" id="valor"></span></th>
                </thead>
                <tbody>
                    @foreach ($comparables as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><span id="n.comparable{{ $loop->iteration }}" name="n.comparable{{ $loop->iteration }}"> Comparable {{ $item['arrendamiento'] }}</span></td>
                        <td><span name="v.comparable{{ $loop->iteration }}" id="comparable{{ $loop->iteration }}"></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

