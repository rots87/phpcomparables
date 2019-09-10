<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelCliente extends Model
{
    use SoftDeletes;

    protected $table = 'tblcliente';

    protected $primaryKey = 'id';

    protected $fillable = [
      'nombre', 'nombre_corto', 'sector_id',
    ];

    protected $hidden = [
        'id',
    ];
}
