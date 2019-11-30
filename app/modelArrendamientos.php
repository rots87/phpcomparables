<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelArrendamientos extends Model
{
    protected $table = 'tblarrendamientos';

    protected $primaryKey = 'id';

    protected $fillable = [
      'anio','tipo','mt2','precio','direccion','municipio','departamento','web','foto',
    ];

    protected $hidden = [
        'id',
    ];
}
