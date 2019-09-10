<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelSector extends Model
{
    use SoftDeletes;

    protected $table = 'tblsector';

    protected $primaryKey = 'id';

    protected $fillable = [
      'nombre', 'habilitado'
    ];

    protected $hidden = [
      'id'
    ];
}
