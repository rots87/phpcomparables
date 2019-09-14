<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEstudios extends Model
{
    protected $table = 'tblestudios';

    protected $primarykey = 'id';

    protected $fillable = [
        'cliente_id', 'anio', 'estatus',
    ];

    protected $hidden = [
        'id',
    ];
}
