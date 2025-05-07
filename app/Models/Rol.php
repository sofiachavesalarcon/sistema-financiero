<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'idrol';
    protected $fillable = ['rol_descripcion', 'estado','fecha_registro'];
    public $timestamps = false;
    protected $casts = [
        'fecha_registro' => 'datetime', 
    ];

}
