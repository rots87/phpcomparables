<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelOferta extends Model
{
    protected $table = 'tblofertas';

    protected $primaryKey = 'id';

    protected $fillable = [
      'anio', 'cliente_id', 'estatus'
    ];

    protected $hidden = [
      'id'
    ];
}
