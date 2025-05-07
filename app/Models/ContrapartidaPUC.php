<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContrapartidaPUC extends Model
{
    protected $table = 'contrapartida_puc';
    protected $primaryKey = 'idcontra';
    public $timestamps = false;

    protected $fillable = [
        'contpuc_codigo',
        'contpuc_descripcion',
        'contpuc_tipo',
        'puc_idpuc',
        'estado',
        'fecha_registro'
    ];
    protected $casts = [
        'fecha_registro' => 'datetime', 
    ];
    public function puc()
    {
        return $this->belongsTo(PUC::class, 'puc_idpuc');
    }
}
