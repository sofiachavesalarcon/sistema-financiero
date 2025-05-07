<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idusu');
            $table->string('usua_nombre', 45);
            $table->foreignId('rol_idrol')->constrained('roles', 'idrol');
            $table->foreignId('muni_idmuni')->constrained('municipios', 'idmuni');
            $table->foreignId('depar_iddepar')->constrained('departamentos', 'iddepar');
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->timestamp('fecha_registro')->useCurrent();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
