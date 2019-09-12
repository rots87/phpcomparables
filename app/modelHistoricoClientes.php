<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelHistoricoClientes extends Model
{
    protected $table = 'tblhistoricoclientes';

    protected $primaryKey = 'id';

    protected $fillable = [
      'nombre', 'nombre_corto', 'giro', 'actividad_economica','estatus','sector_id','cliente_id',
    ];

    protected $hidden = [
      'id'
    ];
}
