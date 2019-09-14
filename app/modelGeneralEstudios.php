<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelGeneralEstudios extends Model
{
    protected $table = 'tblgeneralestudios';

    protected $primarykey = 'id';

    protected $fillable = [
        'anio', 'totalEPT', 'progreso',
    ];

    protected $hidden = [
        'id',
    ];
}
