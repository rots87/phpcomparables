@extends('index')

@section('contenido')
<h3 class="text-center" style="margin: 5px;">Listado de comparables del año {!!$anio!!}</h3>
<div class="container">
    <div class="row justify-content-center">
        <br>
        <table class="table table-sm">
            <thead class="thead-dark">
                <th>#</th>
                <th>Tipo de Arrendamiento</th>
                <th>Area</th>
                <th>Costo</th>
                <th>Direccion</th>
                <th>Municipio</th>
                <th>Departamento</th>
                <th>Web</th>
                <th>Foto</th>
            </thead>
            <tbody>
                @foreach ($data as $arrendamiento)
                <tr>
                    <th>{!! $arrendamiento->id !!}</th>
                    <td>{!! $arrendamiento->nombre !!}</td>
                    <td>{!! $arrendamiento->mt2 !!}</td>
                    <td>{!! $arrendamiento->precio !!}</td>
                    <td>{!! $arrendamiento->direccion !!}</td>
                    <td>{!! $arrendamiento->municipio !!}</td>
                    <td>{!! $arrendamiento->departamento !!}</td>
                    <td>
                        <div class="row">
                            <button type="button" id="copy" name="copy" onclick="doCopy('{!! $arrendamiento->web !!}');" class="btn btn-primary btn-sm">
                                <i class="far fa-copy"></i>
                            </button>
                            <button type="button" id="visit" name="visit" onclick="doUrl('{!! $arrendamiento->web !!}');" class="btn btn-success btn-sm">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <button type="button" id="visit" name="visit" onclick="doImage('{!! $arrendamiento->foto !!}');" class="btn btn-warning btn-sm">
                                    <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-end">
        <select name="filter" id="filter" class="form-control col-sm-2">
            <option value="">TODOS</option>
        @foreach ($filter as $data)
            <option value="{!! $data->id !!}">{!! $data->nombre !!}</option>
        @endforeach
    </select>
    <button type="button" id="filter" name="filter" onclick="doFilter();" class="btn btn-primary btn-sm">
        <i class="fas fa-search"></i>
    </button>
    </div>
</div>
@endsection

@section('scripts footer')
    <script type="text/javascript">
        function doFilter() {
            var filter = document.getElementById("filter").value;
            var url = {!! json_encode(route('arrendamientos.show',$anio)) !!};
            window.open(url+"/"+filter,"_self");
        };

        function doCopy(url) {
            var urlHelper = document.createElement("input");
            urlHelper.className = 'urlHelper';
            document.body.appendChild(urlHelper);
            urlHelper.value = url;
            urlHelper.select();
            document.execCommand('copy');
            document.body.removeChild(urlHelper);
        };

        function doUrl(url) {
            window.open(url,"_blank");
        };

        function doImage(image) {
            var url = {!! json_encode(url('/localarr/')) !!}+'/'+image;
            window.open(url,"_blank");
        }
    </script>
@endsection
