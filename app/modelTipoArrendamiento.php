<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelTipoArrendamiento extends Model
{
    protected $table = 'tbltipoarrendamiento';

    protected $primaryKey = 'id';

    protected $fillable = [
      'nombre'
    ];

    protected $hidden = [
      'id'
    ];
}
