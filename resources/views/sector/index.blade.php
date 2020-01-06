@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px;">Listado de Sectores Economicos Según Hacienda</h3>

<div class="container">
    <div class="row justify-content-center">
        <table class="table table-striped col-sm-8">
            <thead class="thead-dark">
                <th style="width: 10%">#</th>
                <th style="width: 70%">Nombre</th>
                <th style="width: 20%">Acciones</th>
            </thead>
            <tbody>
                @foreach ($data as $sector)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$sector->sec_nombre}}</td>
                    <td>
                        <div class="row">
                            <a href="{{route('sector.edit',$sector->sec_id)}}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            @if ($sector->sec_habilitado)
                                <a href="{{route('sector.flip',$sector->sec_id)}}" class="btn btn-sm btn-warning" role="button"><i class="fas fa-ban"></i></a>
                            @else
                                <a href="{{route('sector.flip',$sector->sec_id)}}" class="btn btn-sm btn-success" role="button"><i class="fas fa-check"></i></a>
                            @endif

                            {{ Form::open(['route' => ['sector.destroy',$sector->sec_id], 'method' => 'delete', 'onsubmit' => 'return confirm("¿Esta seguro que desea eliminar el sector?")']) }}
                                <button type="submit" class="btn btn-sm btn-danger" name="button"><i class="fas fa-times-circle"></i></button>
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

      <div class="row justify-content-between col-sm-8 offset-sm-2">
          <div class="pagination-sm">
            {{ $data->appends(['sort' => 'nombre'])->links() }}
          </div>
          <div class="">
            <a href="{{route('sector.create')}}" class="btn btn-outline-success btn-sm" role="button"><i class="fas fa-edit"></i>Nuevo</a>
          </div>

    </div>
</div>

@endsection
