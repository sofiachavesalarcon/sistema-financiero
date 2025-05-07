<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PUC extends Model
{
    protected $table = 'puc';
    protected $primaryKey = 'idpuc';
    public $timestamps = false;

    protected $fillable = [
        'puc_codigo',
        'puc_descripcion',
        'puc_naturaleza',
        'estado',
        'fecha_registro'
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];
}
