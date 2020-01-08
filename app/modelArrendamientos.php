<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelArrendamientos extends Model
{
    protected $table = 'tblarrendamientos';

    protected $primaryKey = 'arr_id';

    protected $fillable = [
      'arr_anio','tipoarrendamiento_id','arr_mt2','arr_precio','arr_direccion','arr_municipio','arr_departamento','arr_web','arr_foto',
    ];

    protected $hidden = [
        'arr_id',
    ];

    public function tipo_arrendamiento()
    {
        return $this->belongsTo(modelTipoArrendamiento::class,'tipoarrendamiento_id','tar_id');
    }
}
