<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelOferta extends Model
{
    protected $table = 'tblofertas';

    protected $primaryKey = 'ofe_id';

    protected $fillable = [
      'ofe_anio', 'cliente_id', 'ofe_estatus'
    ];

    protected $hidden = [
      'ofe_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(modelCliente::class,'cliente_id','cli_id');
    }
}
