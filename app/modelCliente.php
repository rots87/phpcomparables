<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelCliente extends Model
{
    use SoftDeletes;

    protected $table = 'tblclientes';

    protected $primaryKey = 'cli_id';

    protected $fillable = [
      'cli_nombre', 'cli_nombre_corto', 'sector_id', 'cli_giro','cli_actividad_economica','cli_estatus','cli_anio',
    ];

    protected $hidden = [
        'cli_id',
    ];

    public function historico()
    {
        return $this->hasMany(modelHistoricoClientes::class,'cliente_id','cli_id');
    }

    public function oferta()
    {
        return $this->hasMany(modelOferta::class,'cliente_id','cli_id');
    }

    public function estudio()
    {
        return $this->hasMany(modelEstudios::class, 'cliente_id', 'cli_id');
    }
}
