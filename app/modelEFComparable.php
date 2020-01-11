<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEFComparable extends Model
{
    protected $table = 'tblempresacomparable';

    protected $primaryKey = 'eco_id';

    protected $fillable = [
        'eco_ejercicio','eco_ingresos','eco_ingresos_financieros','eco_otros_ingresos', 'eco_costo_venta',
        'eco_gastos_venta','eco_gastos_admon','eco_gastos_finan','eco_otros_gastos',
        'eco_isr','eco_reserva_legal','eco_gnd','empresa_id',
    ];

    protected $hidden = [
        'eco_id',
    ];

    public function empresa()
    {
        return $this->belongsTo('tblempresa','empresa_id','emp_id');
    }
}
