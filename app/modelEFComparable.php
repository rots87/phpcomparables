<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEFComparable extends Model
{
    protected $table = 'tblempresacomparable';

    protected $primarykey = 'id';

    protected $fillable = [
        'ejercicio','ingresos','ingresos_financieros','otros_ingresos', 'costo_venta',
        'gastos_venta','gastos_admon','gastos_finan','otros_gastos',
        'isr','reserva_legal','gnd','empresa_id',
    ];

    protected $hidden = [
        'id',
    ];
}
