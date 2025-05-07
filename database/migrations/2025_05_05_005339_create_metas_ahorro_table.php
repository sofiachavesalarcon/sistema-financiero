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
        Schema::create('metas_ahorro', function (Blueprint $table) {
            $table->id('idmetah');
            $table->decimal('metah_monto', 10, 2);
            $table->string('metah_descripcion', 255);
            $table->date('metah_fecha_meta');
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
        Schema::dropIfExists('metas_ahorro');
    }
};
