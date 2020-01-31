@extends('index')

@section('contenido')
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
