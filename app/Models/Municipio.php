<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'idmuni';
    public $timestamps = false;

    protected $fillable = [
        'muni_nombre',
        'estado',
        'fecha_registro',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];
}
