<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelEmpresaComparable extends Model
{
    protected $table = 'tblempresa';

    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'emp_nombre','emp_nit','emp_giro','emp_expediente','emp_last_ef'
    ];

    protected $hidden = [
        'emp_id',
    ];

    public function ef()
    {
        return $this->hasMany('tblempresacomparable','empresa_id','emp_id');
    }
}
