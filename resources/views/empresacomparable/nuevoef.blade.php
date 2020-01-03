@extends('index')

@section('contenido')
<p>
    <h3 class="text-center" style="margin: 5px">Ingreso de nuevo EF</h3>
</p>
{!! Form::open(array('route' => 'empresacomparable.vistaprevia', 'method' => 'POST')) !!}
<div class="container">
    <div class="row justify-content-center form-group">
        <label for="Nombre_Empresa" class="col-sm-2 col-form-label">Seleccione la Empresa</label>
        <div class="col-sm-6">
            <select name="empresa_id" id="empresa_id" class="form-control">
                @foreach ($empresas as $empresa)
                @if ($empresa->id == $id)
                <option value="{{$empresa->id}}" selected>{{$empresa->nombre}}</option>
                @else
                <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="ejercicio" class="col-sm-2 col-form-label">Año del EF</label>
        <div class="col-sm-6">
            <input type="number" name="ejercicio" id="ejercicio" min="2000" max="2099" value={{date('Y')}}
                class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="ingresos" class="col-sm-2 col-form-label">Ingresos Netos</label>
        <div class="col-sm-6">
            <input type="number" id="ingresos" name="ingresos" min="0" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="ingresos_financieros" id="" name="" class="col-sm-2 col-form-label">Ingresos Financieros</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="ingresos_financieros" name="ingresos_financieros" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="otros_ingresos" class="col-sm-2 col-form-label">Otros Ingresos</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="otros_ingresos" name="otros_ingresos" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
            <label for="costo_venta" class="col-sm-2 col-form-label">Costo de Venta</label>
            <div class="col-sm-6">
                <input type="number" min="0" id="costo_venta" name="costo_venta" value="0" class="form-control">
            </div>
        </div>
    <div class="row justify-content-center form-group">
        <label for="gastos_venta" class="col-sm-2 col-form-label">Gastos de Venta</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="gastos_venta" name="gastos_venta" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="gastos_admon" class="col-sm-2 col-form-label">Gastos de administracion</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="gastos_admon" name="gastos_admon" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="gastos_finan" class="col-sm-2 col-form-label">Gastos Financieros</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="gastos_finan" name="gastos_finan" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="otros_gastos" class="col-sm-2 col-form-label">Otros Gastos</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="otros_gastos" name="otros_gastos" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="isr" class="col-sm-2 col-form-label">Impuestos sobre la Renta</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="isr" name="isr" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
        <label for="reserva_legal" class="col-sm-2 col-form-label">Reserva Legal</label>
        <div class="col-sm-6">
            <input type="number" min="0" id="reserva_legal" name="reserva_legal" value="0" class="form-control">
        </div>
    </div>
    <div class="row justify-content-center form-group">
            <label for="gnd" class="col-sm-2 col-form-label">Gasto No Deducible</label>
            <div class="col-sm-6">
                <input type="number" min="0" id="gnd" name="gnd" value="0" class="form-control">
            </div>
    </div>
    <div class="row justify-content-end form-group">
        <button type="submit" class="btn btn-success">Vista Previa</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
