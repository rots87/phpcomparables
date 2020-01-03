@extends('index')

@section('contenido')
<h3 class="text-center">Estados financieros de años {{$ejercicio->ejercicio}} y {{$ejercicio->ejercicio -1}} </h3>
<br>
<div class="container">
    <div class="row">
        <table class="table table-sm">
            <thead class="thead-dark">
                <th class="col-sm-4">Concepto</th>
                <th class="col-sm-2">Año {{$ejercicio->ejercicio}}</th>
                <th class="col-sm-2">Año {{$ejercicio->ejercicio - 1}}</th>
                <th class="col-sm-2">Promedio</th>
                <th class="col-sm-2">Porcentaje</th>

            </thead>
            <tbody>
                <tr>
                    <th>Ingresos</th>
                    <td>{{$ejercicio->ingresos}}</td>
                    <td>{{$ejercicioAnt->ingresos}}</td>
                    <td>{{$promedio->ingresos}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Costo de Venta</th>
                    <td>{{$ejercicio->costo_venta}}</td>
                    <td>{{$ejercicioAnt->costo_venta}}</td>
                    <td>{{$promedio->costo_venta}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad Bruta</th>
                    <th>{{$ejercicio->ingresos - $ejercicio->costo_venta}}</th>
                    <th>{{$ejercicioAnt->ingresos - $ejercicioAnt->costo_venta}}</th>
                    <th>{{$promedio->ingresos - $promedio->costo_venta}}</th>
                    <th><?php
                        try {
                            echo((($promedio->ingresos - $promedio->costo_venta)/$promedio->ingresos)*100 .'%');
                        } catch (\Throwable $th) {
                            echo('Error al calcular');
                        }
                        ?></th>
                </tr>
                <tr>
                    <th>Gasto de Venta</th>
                    <td>{{$ejercicio->gastos_venta}}</td>
                    <td>{{$ejercicioAnt->gastos_venta}}</td>
                    <td>{{$promedio->gastos_venta}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Gasto de Administracion</th>
                    <td>{{$ejercicio->gastos_admon}}</td>
                    <td>{{$ejercicioAnt->gastos_admon}}</td>
                    <td>{{$promedio->gastos_admon}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad de la Operacion</th>
                    <th>{{$ejercicio->ingresos - $ejercicio->costo_venta - ($ejercicio->gastos_venta + $ejercicio->gastos_admon)}}</th>
                    <th>{{$ejercicioAnt->ingresos - $ejercicioAnt->costo_venta - ($ejercicioAnt->gastos_venta + $ejercicioAnt->gastos_admon)}}</th>
                    <th>{{$promedio->ingresos - $promedio->costo_venta - ($promedio->gastos_venta + $promedio->gastos_admon)}}</th>
                    <th><?php
                        try {
                            echo ((($promedio->ingresos - $promedio->costo_venta - ($promedio->gastos_venta + $promedio->gastos_admon))/$promedio->ingresos)*100 .'%');
                        } catch (\Throwable $th) {
                            echo('Error al calcular');
                        }
                        ?></th>
                </tr>
                <tr>
                    <th>Gasto Financiero</th>
                    <td>{{$ejercicio->gastos_finan}}</td>
                    <td>{{$ejercicioAnt->gastos_finan}}</td>
                    <td>{{$promedio->gastos_finan}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Otros Gastos</th>
                    <td>{{$ejercicio->otros_gastos}}</td>
                    <td>{{$ejercicioAnt->otros_gastos}}</td>
                    <td>{{$promedio->otros_gastos}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Otros Ingresos</th>
                    <td>{{$ejercicio->otros_ingresos}}</td>
                    <td>{{$ejercicioAnt->otros_ingresos}}</td>
                    <td>{{$promedio->otros_ingresos}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Ingresos Financieros</th>
                    <td>{{$ejercicio->ingresos_financieros}}</td>
                    <td>{{$ejercicioAnt->ingresos_financieros}}</td>
                    <td>{{$promedio->ingresos_financieros}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad antes de Impuesto y Reserva</th>
                    <th>{{$ejercicio->ingresos - $ejercicio->costo_venta - ($ejercicio->gastos_venta + $ejercicio->gastos_admon + $ejercicio->gastos_finan + $ejercicio->otros_gastos) + ($ejercicio->otros_ingresos + $ejercicio->ingresos_financieros)}}</th>
                    <th>{{$ejercicioAnt->ingresos - $ejercicioAnt->costo_venta - ($ejercicioAnt->gastos_venta + $ejercicioAnt->gastos_admon + $ejercicioAnt->gastos_finan + $ejercicioAnt->otros_gastos) + ($ejercicioAnt->otros_ingresos + $ejercicioAnt->ingresos_financieros)}}</th>
                    <th>{{$promedio->ingresos - $promedio->costo_venta - ($promedio->gastos_venta + $promedio->gastos_admon + $promedio->gastos_finan + $promedio->otros_gastos) + ($promedio->otros_ingresos + $promedio->ingresos_financieros)}}</th>
                    <th><?php
                        try {
                            echo ((($promedio->ingresos - $promedio->costo_venta - ($promedio->gastos_venta + $promedio->gastos_admon + $promedio->gastos_finan + $promedio->otros_gastos) + ($promedio->otros_ingresos + $promedio->ingresos_financieros))/$promedio->ingresos)*100 .'%');
                        } catch (\Throwable $th) {
                            echo('Error al calcular');
                        }
                        ?></th>
                </tr>
                <tr>
                    <th>Reserva Legal</th>
                    <td>{{$ejercicio->reserva_legal}}</td>
                    <td>{{$ejercicioAnt->reserva_legal}}</td>
                    <td>{{$promedio->reserva_legal}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>ISR</th>
                    <td>{{$ejercicio->isr}}</td>
                    <td>{{$ejercicioAnt->isr}}</td>
                    <td>{{$promedio->isr}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad del Ejercicio</th>
                    <th>{{$ejercicio->ingresos - $ejercicio->costo_venta - ($ejercicio->gastos_venta + $ejercicio->gastos_admon + $ejercicio->gastos_finan + $ejercicio->otros_gastos) + ($ejercicio->otros_ingresos + $ejercicio->ingresos_financieros) - $ejercicio->reserva - $ejercicio->isr}}</th>
                    <th>{{$ejercicioAnt->ingresos - $ejercicioAnt->costo_venta - ($ejercicioAnt->gastos_venta + $ejercicioAnt->gastos_admon + $ejercicioAnt->gastos_finan + $ejercicioAnt->otros_gastos) + ($ejercicioAnt->otros_ingresos + $ejercicioAnt->ingresos_financieros) - $ejercicioAnt->reserva - $ejercicioAnt->isr}}</th>
                    <th>{{$promedio->ingresos - $promedio->costo_venta - ($promedio->gastos_venta + $promedio->gastos_admon + $promedio->gastos_finan + $promedio->otros_gastos) + ($promedio->otros_ingresos + $promedio->ingresos_financieros) - $promedio->reserva - $promedio->isr}}</th>
                    <th><?php
                        try {
                            echo((($promedio->ingresos - $promedio->costo_venta - ($promedio->gastos_venta + $promedio->gastos_admon + $promedio->gastos_finan + $promedio->otros_gastos) + ($promedio->otros_ingresos + $promedio->ingresos_financieros) - $promedio->reserva - $promedio->isr)/$promedio->ingresos)*100 .'%');
                        } catch (\Throwable $th) {
                            echo('Error al calcular');
                        }
                        ?></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
