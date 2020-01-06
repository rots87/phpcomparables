<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelCliente extends Model
{
    use SoftDeletes;

    protected $table = 'tblclientes';

    protected $primaryKey = 'cli_id';

    protected $fillable = [
      'cli_nombre', 'cli_nombre_corto', 'sector_id', 'cli_giro','cli_actividad_economica','cli_estatus','cli_anio',
    ];

    protected $hidden = [
        'cli_id',
    ];
}
