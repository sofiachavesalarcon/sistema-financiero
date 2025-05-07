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
        Schema::create('egresos', function (Blueprint $table) {
            $table->id('idegr');
            $table->decimal('egres_monto', 10, 2);
            $table->date('egres_fecha');
            $table->string('egres_descripcion', 255);
            $table->enum('egres_tipo', ['Fijo', 'Variable']);
            $table->foreignId('contpuc_idcontpuc')->constrained('contrapartida_puc', 'idcontpuc');
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
        Schema::dropIfExists('egresos');
    }
};
