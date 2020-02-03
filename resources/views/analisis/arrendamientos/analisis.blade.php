@extends('index')

@section('contenido')
<div class="container" >
    <div class="row justify-content-between" style="margin: 10px;">
        <button class="btn btn-primary" id="btn-precio" name="btn-precio" onclick="precio()">Analisis por Precio</button>
        <button class="btn btn-primary" id="btn-area" name="btn-area" onclick="area()" disabled>Analisis por Precio/mt2</button>
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
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <th>Cuartil</th>
                    <th>Valor</th>
                </thead>
                <tbody onload="myFunction()">
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
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Desviacion Tipica</td>
                        <td>2</td>
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
                    <th>Valor del mt2</th>
                </thead>
                <tbody>
                    @foreach ($comparables as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>Comparable {{ $item['arrendamiento'] }}</td>
                        <td>{{ $item['precio'] / $item['area'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-8">
            table
        </div>
    </div>
</div>
@endsection

@section('scripts footer')
<script type="text/javascript" src="{!! asset('js/cuartil.js') !!}"></script>
@endsection
