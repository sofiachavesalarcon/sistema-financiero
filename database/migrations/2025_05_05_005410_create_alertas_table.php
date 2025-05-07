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
        Schema::create('alertas', function (Blueprint $table) {
            $table->id('idaler');
            $table->string('aler_mensaje', 255);
            $table->date('aler_fecha_alerta');
            $table->enum('aler_estado', ['Pendiente', 'Resuelta']);
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
        Schema::dropIfExists('alertas');
    }
};
