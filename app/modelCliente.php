<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelCliente extends Model
{
    use SoftDeletes;

    protected $table = 'tblclientes';

    protected $primaryKey = 'id';

    protected $fillable = [
      'nombre', 'nombre_corto', 'sector_id', 'giro','actividad_economica','estatus','anio',
    ];

    protected $hidden = [
        'id',
    ];
}
