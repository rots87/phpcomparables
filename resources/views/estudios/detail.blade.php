@extends('index')

@section('contenido')
<div id="accordion" class="container">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    Por Actualizar
                </button>
            </h5>
        </div>
        <div id="collapseOne" class="collapse multi-collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($poractualizar as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    Actualizado
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse multi-collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($actualizado as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    En Desarrollo
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse multi-collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($desarrollo as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="false" aria-controls="collapseFour">
                    En Revision Interna
                </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse multi-collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($revInterna as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="false" aria-controls="collapseFive">
                    En Correccion Interna
                </button>
            </h5>
        </div>
        <div id="collapseFive" class="collapse multi-collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($correcion1 as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSix">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="false" aria-controls="collapseSix">
                    En Revision del Cliente
                </button>
            </h5>
        </div>
        <div id="collapseSix" class="collapse multi-collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($revCliente as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSeven">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven"
                    aria-expanded="false" aria-controls="collapseSeven">
                    En Correccion del Cliente
                </button>
            </h5>
        </div>
        <div id="collapseSeven" class="collapse multi-collapse" aria-labelledby="headingSeven" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($correccion2 as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingEight">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight"
                    aria-expanded="false" aria-controls="collapseEight">
                    Listo para Imprimir
                </button>
            </h5>
        </div>
        <div id="collapseEight" class="collapse multi-collapse" aria-labelledby="headingEight" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($imprimir as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingNine">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine"
                    aria-expanded="false" aria-controls="collapseNine">
                    Entregado
                </button>
            </h5>
        </div>
        <div id="collapseNine" class="collapse multi-collapse" aria-labelledby="headingNine" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        @foreach ($entregado as $value)
                        @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
                    </tr>
                    <tr>
                        @else
                        <td>{{ $value->cli_nombre }}</td>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <p class="d-print-none">
        <button class="btn btn-block btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse"
            aria-expanded="false"
            aria-controls="collapseOne collapseTwo collapseThree collapseFour collapseFive collapseSix collapseSeven collapseEight collapseNine">Mostrar
            u Ocular Elementos</button>
    </p>
</div>
{{-- <h3 class="text-center">POR ACTUALIZAR</h3>
    <div class="container">
        <div class="row">
            <table class="table table-sm">
                <tr>
                @foreach ($poractualizar as $value)
                    @if (($loop->iteration%4)==0)
                        <td>{{ $value->cli_nombre }}</td>
</tr>
<tr>
    @else
    <td>{{ $value->cli_nombre }}</td>
    @endif
    @endforeach
</tr>
</table>
</div>
</div>
<h3 class="text-center">ACTUALIZADO</h3>
<div class="container">
    <div class="row">
        <table class="table table-sm">
            <tr>
                @foreach ($actualizado as $value)
                @if (($loop->iteration%4)==0)
                <td>{{ $value->cli_nombre }}</td>
            </tr>
            <tr>
                @else
                <td>{{ $value->cli_nombre }}</td>
                @endif
                @endforeach
            </tr>
        </table>
    </div>
</div>
<h3 class="text-center">EN DESARROLLO</h3>
<h3 class="text-center">EN REVISION INTERNA</h3>
<h3 class="text-center">EN CORRECCION</h3>
<h3 class="text-center">EN REVISION DEL CLIENTE</h3>
<h3 class="text-center">EN CORRECCION DEL CLIENTE</h3>
<h3 class="text-center">LISTO PARA IMPRIMIR</h3>
<h3 class="text-center">ENTREGADO</h3> --}}
@endsection
