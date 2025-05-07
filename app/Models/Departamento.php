<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'iddepar';
    public $timestamps = false;

    protected $fillable = [
        'depar_nombre',
        'estado',
        'fecha_registro',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];
}
