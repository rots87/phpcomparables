@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px;">Listado de clientes para el Ejecicio {{$anio}}</h3>
<div class="container">
    <div class="row justify-content-sm-center">
        <table class="table table-striped table-sm table-responsive-sm">
            <thead class="thead-dark text-center">
                <th style="width: 5%">#</th>
                <th style="width: 25%">Empresa</th>
                <th style="width: 5%">Progreso</th>
                <th style="width: 20%">Estado Actual</th>
                <th style="width: 20%">Acciones</th>
            </thead>
            <tbody>
                <?php $x = 0; ?>
                @foreach ($data as $estudio)
                <th class="text-center">{!! $x = $x + 1;!!}</th>
                <td>{{ $estudio->cliente_nombre }}</td>
                <td class="text-center">{{ ($estudio->progreso/8)*100 }}%</td>
                <td class="text-center">
                    <h5><span class="badge badge-info">{{$estudio->estatus}}</span></h5>
                </td>
                <td>
                    {!! Form::open(['route' => ['estudios.progress', $estudio->id], 'method'=>'PUT']) !!}
                        <div class="form-group">
                            <div class="row">
                                <select name="progreso" id="progreso" class="form-control col-sm-9">
                                    @foreach($estatus as $estado)
                                        <option value="{{ $loop->iteration }}">{{ $estado }}</option>
                                    @endforeach
                                </select>    
                                <button type="submit" class="btn btn-primary btn-sm" style="margin:5px">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmar() {
        if (confirm('Cada modificacion afecta directamente el progreso anual y del EPT.\n¿Esta seguro de modificarlo?')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
