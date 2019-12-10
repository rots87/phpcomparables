@extends('index')

@section('contenido')
<p>
    <h3 class="text-center" style="margin: 5px">Vista Previa de EF del Año {{$ef->ejercicio}} para la empresa
        {{$empresa_nombre}}</h3>
</p>
{!! Form::open(array('route' => 'empresacomparable.storeef', 'method' => 'POST')) !!}
{!! Form::hidden('ejercicio', $ef->ejercicio) !!}
{!! Form::hidden('ingresos', $ef->ingresos) !!}
{!! Form::hidden('ingresos_financieros', $ef->ingresos_financieros) !!}
{!! Form::hidden('otros_ingresos', $ef->otros_ingresos) !!}
{!! Form::hidden('gastos_venta', $ef->gastos_venta) !!}
{!! Form::hidden('gastos_admon', $ef->gastos_admon) !!}
{!! Form::hidden('gastos_finan', $ef->gastos_finan) !!}
{!! Form::hidden('otros_gastos', $ef->otros_gastos) !!}
{!! Form::hidden('isr', $ef->isr) !!}
{!! Form::hidden('reserva_legal', $ef->reserva_legal) !!}
{!! Form::hidden('gnd', $ef->gnd) !!}
{!! Form::hidden('costo_venta', $ef->costo_venta) !!}

<div class="container">
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Ingresos
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->ingresos, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Costo de Venta
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->costo_venta, 0)}}
        </span>
    </div>
    <hr class="col-6">
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            <b>Utilidad Bruta</b>
        </span>
        <span class="col-3 col-form-label text-right">
            <b>{{number_format($ef->ingresos - $ef->costo_venta, 0)}}</b>
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Gasto de Venta
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->gastos_venta, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Gasto de Administracion
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->gastos_admon, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            <b>Utilidad de la Operacion</b>
        </span>
        <span class="col-3 col-form-label text-right">
            <b>{{number_format(($ef->ingresos - $ef->costo_venta - ($ef->gastos_venta + $ef->gastos_admon)), 0)}}</b>
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Gasto Financiero
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->gastos_finan, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Otros Gastos
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->otros_gastos, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Otros Ingresos
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->otros_ingresos, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Ingresos Financieros
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->ingresos_financieros, 0)}}
        </span>
    </div>
    <hr class="col-6">
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            <b>Utilidad antes de Impuesto y Reserva</b>
        </span>
        <span class="col-3 col-form-label text-right">
            <b>{{number_format(($ef->ingresos - $ef->costo_venta - ($ef->gastos_venta + $ef->gastos_admon + $ef->gastos_finan + $ef->otros_gastos) + ($ef->otros_ingresos + $ef->ingresos_financieros)), 0)}}</b>
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            Reserva Legal
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->reserva_legal, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            ISR
        </span>
        <span class="col-3 col-form-label text-right">
            {{number_format($ef->isr, 0)}}
        </span>
    </div>
    <div class="row justify-content-center form-group">
        <span class="col-3 col-form-label">
            <b>Utilidad del Ejercicio</b>
        </span>
        <span class="col-3 col-form-label text-right">
            <b>{{number_format(($ef->ingresos - $ef->costo_venta - ($ef->gastos_venta + $ef->gastos_admon + $ef->gastos_finan + $ef->otros_gastos) + ($ef->otros_ingresos + $ef->ingresos_financieros) - $ef->reserva - $ef->isr), 0)}}</b>
        </span>
    </div>
</div>
</div>
<div class="row justify-content-end">
    <a href="javascript:history.back()" class="btn btn-sm btn-danger" style="margin: 5px">Atras</a>
    <button type="submit" class="btn btn-sm btn-success" style="margin: 5px">Guardar</button>
</div>
</div>
{!! Form::close() !!}
@endsection
