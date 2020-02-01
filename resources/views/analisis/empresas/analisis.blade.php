@extends('index')

@section('contenido')

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    @foreach ($comparables as $item)
                        <th colspan="4">Comparable {{$loop->iteration}}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($comparables as $item)
                        <th>2019</th>
                        <th>2018</th>
                        <th>Promedio</th>
                        <th>%</th>
                    @endforeach

                </tr>
            </thead>
        </table>
    </div>
</div>

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
                        <td><span id="minimo" name="minimo">2</span></td>
                    </tr>
                    <tr>
                        <td>Primer Cuartil</td>
                        <td><span id="primerq" name="primerq">2</span></td>
                    </tr>
                    <tr>
                        <td>Segundo Cuartil</td>
                        <td><span id="segundoq" name="segundoq">2</span></td>
                    </tr>
                    <tr>
                        <td>Tercer Cuartil</td>
                        <td><span id="tercerq" name="tercerq">2</span></td>
                    </tr>
                    <tr>
                        <td>Maximo</td>
                        <td><span id="maximo" name="maximo">2</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <button onclick="myFunction()">Prueba</button>
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <th>Medida</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
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
                        <td>{{ $item['arrendamiento'] }}</td>
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
