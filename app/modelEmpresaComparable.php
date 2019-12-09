<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEmpresaComparable extends Model
{
    protected $table = 'tblempresa';

    protected $primarykey = 'id';

    protected $fillable = [
        'nombre','nit','giro','expediente',
    ];

    protected $hidden = [
        'id',
    ];
}
