<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEFComparable extends Model
{
    protected $table = 'tblempresacomparable';

    protected $primarykey = 'eco_id';

    protected $fillable = [
        'eco_ejercicio','eco_ingresos','eco_ingresos_financieros','eco_otros_ingresos', 'eco_costo_venta',
        'eco_gastos_venta','eco_gastos_admon','eco_gastos_finan','eco_otros_gastos',
        'eco_isr','eco_reserva_legal','eco_gnd','eco_empresa_id',
    ];

    protected $hidden = [
        'eco_id',
    ];
}
