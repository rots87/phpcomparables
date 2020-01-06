<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelTipoArrendamiento extends Model
{
    protected $table = 'tbltipoarrendamiento';

    protected $primaryKey = 'tar_id';

    protected $fillable = [
      'tar_nombre'
    ];

    protected $hidden = [
      'tar_id'
    ];
}
