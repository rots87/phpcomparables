<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEstudios extends Model
{
    protected $table = 'tblestudios';

    protected $primaryKey = 'est_id';

    protected $fillable = [
        'cliente_id', 'est_anio', 'est_progreso',
    ];

    protected $hidden = [
        'est_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(modelCliente::class,'cliente_id','cli_id');
    }
}
