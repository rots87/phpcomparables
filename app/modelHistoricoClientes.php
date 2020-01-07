<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelHistoricoClientes extends Model
{
    protected $table = 'tblhistoricoclientes';

    protected $primaryKey = 'hcl_id';

    protected $fillable = [
      'hcl_nombre', 'hcl_nombre_corto', 'hcl_giro', 'hcl_actividad_economica','hcl_estatus','sector_id','cliente_id',
    ];

    protected $hidden = [
      'hcl_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(modelCliente::class);
    }

    public function sec()
    {
        return $this->belongsTo(modelSector::class,'sector_id','sec_id');
    }
}
