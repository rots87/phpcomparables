@extends('index')

@section('contenido')
<h3 class="text-center">Estados financieros de años {{$ejercicio->eco_ejercicio}} y {{$ejercicio->eco_ejercicio -1}} </h3>
<br>
<div class="container">
    <div class="row">
        <table class="table table-sm">
            <thead class="thead-dark">
                <th class="col-sm-4">Concepto</th>
                <th class="col-sm-2">Año {{$ejercicio->eco_ejercicio}}</th>
                <th class="col-sm-2">Año {{$ejercicio->eco_ejercicio - 1}}</th>
                <th class="col-sm-2">Promedio</th>
                <th class="col-sm-2">Porcentaje</th>

            </thead>
            <tbody>
                <tr>
                    <th>Ingresos</th>
                    <td>{{$ejercicio->eco_ingresos}}</td>
                    <td>{{$ejercicioAnt->eco_ingresos}}</td>
                    <td>{{$promedio->eco_ingresos}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Costo de Venta</th>
                    <td>{{$ejercicio->eco_costo_venta}}</td>
                    <td>{{$ejercicioAnt->eco_costo_venta}}</td>
                    <td>{{$promedio->eco_costo_venta}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad Bruta</th>
                    <th>{{$ejercicio->eco_ingresos - $ejercicio->eco_costo_venta}}</th>
                    <th>{{$ejercicioAnt->eco_ingresos - $ejercicioAnt->eco_costo_venta}}</th>
                    <th>{{$promedio->eco_ingresos - $promedio->eco_costo_venta}}</th>
                    <th><?php
                        try {
                            echo((($promedio->eco_ingresos - $promedio->eco_costo_venta)/$promedio->eco_ingresos)*100 .'%');
                        } catch (\Throwable $th) {
                            echo('Error al calcular');
                        }
                        ?></th>
                </tr>
                <tr>
                    <th>Gasto de Venta</th>
                    <td>{{$ejercicio->eco_gastos_venta}}</td>
                    <td>{{$ejercicioAnt->eco_gastos_venta}}</td>
                    <td>{{$promedio->eco_gastos_venta}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Gasto de Administracion</th>
                    <td>{{$ejercicio->eco_gastos_admon}}</td>
                    <td>{{$ejercicioAnt->eco_gastos_admon}}</td>
                    <td>{{$promedio->eco_gastos_admon}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad de la Operacion</th>
                    <th>{{$ejercicio->eco_ingresos - $ejercicio->eco_costo_venta - ($ejercicio->eco_gastos_venta + $ejercicio->eco_gastos_admon)}}</th>
                    <th>{{$ejercicioAnt->eco_ingresos - $ejercicioAnt->eco_costo_venta - ($ejercicioAnt->eco_gastos_venta + $ejercicioAnt->eco_gastos_admon)}}</th>
                    <th>{{$promedio->eco_ingresos - $promedio->eco_costo_venta - ($promedio->eco_gastos_venta + $promedio->eco_gastos_admon)}}</th>
                    <th><?php
                        try {
                            echo ((($promedio->eco_ingresos - $promedio->eco_costo_venta - ($promedio->eco_gastos_venta + $promedio->eco_gastos_admon))/$promedio->eco_ingresos)*100 .'%');
                        } catch (\Throwable $th) {
                            echo('Error al calcular');
                        }
                        ?></th>
                </tr>
                <tr>
                    <th>Gasto Financiero</th>
                    <td>{{$ejercicio->eco_gastos_finan}}</td>
                    <td>{{$ejercicioAnt->eco_gastos_finan}}</td>
                    <td>{{$promedio->eco_gastos_finan}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Otros Gastos</th>
                    <td>{{$ejercicio->eco_otros_gastos}}</td>
                    <td>{{$ejercicioAnt->eco_otros_gastos}}</td>
                    <td>{{$promedio->eco_otros_gastos}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Otros Ingresos</th>
                    <td>{{$ejercicio->eco_otros_ingresos}}</td>
                    <td>{{$ejercicioAnt->eco_otros_ingresos}}</td>
                    <td>{{$promedio->eco_otros_ingresos}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Ingresos Financieros</th>
                    <td>{{$ejercicio->eco_ingresos_financieros}}</td>
                    <td>{{$ejercicioAnt->eco_ingresos_financieros}}</td>
                    <td>{{$promedio->eco_ingresos_financieros}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad antes de Impuesto y Reserva</th>
                    <th>{{$ejercicio->eco_ingresos - $ejercicio->eco_costo_venta - ($ejercicio->eco_gastos_venta + $ejercicio->eco_gastos_admon + $ejercicio->eco_gastos_finan + $ejercicio->eco_otros_gastos) + ($ejercicio->eco_otros_ingresos + $ejercicio->eco_ingresos_financieros)}}</th>
                    <th>{{$ejercicioAnt->eco_ingresos - $ejercicioAnt->eco_costo_venta - ($ejercicioAnt->eco_gastos_venta + $ejercicioAnt->eco_gastos_admon + $ejercicioAnt->eco_gastos_finan + $ejercicioAnt->eco_otros_gastos) + ($ejercicioAnt->eco_otros_ingresos + $ejercicioAnt->eco_ingresos_financieros)}}</th>
                    <th>{{$promedio->eco_ingresos - $promedio->eco_costo_venta - ($promedio->eco_gastos_venta + $promedio->eco_gastos_admon + $promedio->eco_gastos_finan + $promedio->eco_otros_gastos) + ($promedio->eco_otros_ingresos + $promedio->eco_ingresos_financieros)}}</th>
                    <th><?php
                        try {
                            echo ((($promedio->eco_ingresos - $promedio->eco_costo_venta - ($promedio->eco_gastos_venta + $promedio->eco_gastos_admon + $promedio->eco_gastos_finan + $promedio->eco_otros_gastos) + ($promedio->eco_otros_ingresos + $promedio->eco_ingresos_financieros))/$promedio->eco_ingresos)*100 .'%');
                        } catch (\Throwable $th) {
                            echo('Error al calcular');
                        }
                        ?></th>
                </tr>
                <tr>
                    <th>Reserva Legal</th>
                    <td>{{$ejercicio->eco_reserva_legal}}</td>
                    <td>{{$ejercicioAnt->eco_reserva_legal}}</td>
                    <td>{{$promedio->eco_reserva_legal}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>ISR</th>
                    <td>{{$ejercicio->eco_isr}}</td>
                    <td>{{$ejercicioAnt->eco_isr}}</td>
                    <td>{{$promedio->eco_isr}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Utilidad del Ejercicio</th>
                    <th>{{$ejercicio->eco_ingresos - $ejercicio->eco_costo_venta - ($ejercicio->eco_gastos_venta + $ejercicio->eco_gastos_admon + $ejercicio->eco_gastos_finan + $ejercicio->eco_otros_gastos) + ($ejercicio->eco_otros_ingresos + $ejercicio->eco_ingresos_financieros) - $ejercicio->eco_reserva - $ejercicio->eco_isr}}</th>
                    <th>{{$ejercicioAnt->eco_ingresos - $ejercicioAnt->eco_costo_venta - ($ejercicioAnt->eco_gastos_venta + $ejercicioAnt->eco_gastos_admon + $ejercicioAnt->eco_gastos_finan + $ejercicioAnt->eco_otros_gastos) + ($ejercicioAnt->eco_otros_ingresos + $ejercicioAnt->eco_ingresos_financieros) - $ejercicioAnt->eco_reserva - $ejercicioAnt->eco_isr}}</th>
                    <th>{{$promedio->eco_ingresos - $promedio->eco_costo_venta - ($promedio->eco_gastos_venta + $promedio->eco_gastos_admon + $promedio->eco_gastos_finan + $promedio->eco_otros_gastos) + ($promedio->eco_otros_ingresos + $promedio->eco_ingresos_financieros) - $promedio->eco_reserva - $promedio->eco_isr}}</th>
                    <th><?php
                        try {
                            echo((($promedio->eco_ingresos - $promedio->eco_costo_venta - ($promedio->eco_gastos_venta + $promedio->eco_gastos_admon + $promedio->eco_gastos_finan + $promedio->eco_otros_gastos) + ($promedio->eco_otros_ingresos + $promedio->eco_ingresos_financieros) - $promedio->eco_reserva - $promedio->eco_isr)/$promedio->eco_ingresos)*100 .'%');
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
