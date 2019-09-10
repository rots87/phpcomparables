<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelSector extends Model
{
    use SoftDelete;

    protected $table = 'tblsector';

    protected $primaryKey = 'id';

    protected $fillable = [
      'nombre',
    ];

    protected $hidden = [
      'id'
    ];
}
