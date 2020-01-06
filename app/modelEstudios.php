<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEstudios extends Model
{
    protected $table = 'tblestudios';

    protected $primarykey = 'est_id';

    protected $fillable = [
        'cliente_id', 'est_anio', 'est_estatus',
    ];

    protected $hidden = [
        'est_id',
    ];
}
