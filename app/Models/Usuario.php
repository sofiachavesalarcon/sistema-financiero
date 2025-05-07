<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idusu';
    public $timestamps = false;

    protected $fillable = [
        'usua_nombre',
        'rol_idrol',
        'muni_idmuni',
        'depar_iddepar',
        'estado',
        'fecha_registro'  
    ];

    protected $casts = [
        'fecha_registro' => 'datetime', 
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_idrol');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'muni_idmuni');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'depar_iddepar');
    }
}
