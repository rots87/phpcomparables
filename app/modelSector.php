<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelSector extends Model
{
    use SoftDeletes;

    protected $table = 'tblsector';

    protected $primaryKey = 'sec_id';

    protected $fillable = [
      'sec_nombre', 'sec_habilitado'
    ];

    protected $hidden = [
      'sec_id'
    ];

    public function hcl()
    {
        return $this->hasMany(modelHistoricoClientes::class,'sector_id','sec_id');
    }
}
