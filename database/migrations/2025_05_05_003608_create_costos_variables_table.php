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
        Schema::create('costos_variables', function (Blueprint $table) {
            $table->id('idcosv');
            $table->decimal('costv_monto', 10, 2);
            $table->string('costv_descripcion', 255);
            $table->foreignId('usu_idusu')->constrained('usuarios', 'idusu');
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->timestamp('fecha_registro')->useCurrent();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costos_variables');
    }
};
