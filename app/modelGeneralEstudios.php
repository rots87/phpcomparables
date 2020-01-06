<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelGeneralEstudios extends Model
{
    protected $table = 'tblgeneralestudios';

    protected $primarykey = 'ges_id';

    protected $fillable = [
        'ges_anio', 'ges_totalEPT', 'ges_progreso',
    ];

    protected $hidden = [
        'ges_id',
    ];
}
