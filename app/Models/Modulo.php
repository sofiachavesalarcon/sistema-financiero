<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'idmod';
    public $timestamps = false;

    protected $fillable = [
        'modul_descripcion',
        'estado',
        'fecha_registro'  
    ];

    protected $casts = [
        'fecha_registro' => 'datetime', 
    ];
}
