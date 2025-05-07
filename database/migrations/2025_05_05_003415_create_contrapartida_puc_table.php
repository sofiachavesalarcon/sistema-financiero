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
        Schema::create('contrapartida_puc', function (Blueprint $table) {
            $table->id('idcontpuc');
            $table->string('contpuc_codigo', 45);
            $table->string('contpuc_descripcion', 255);
            $table->enum('contpuc_tipo', ['Ingreso', 'Egreso']);
            $table->foreignId('puc_idpuc')->constrained('puc', 'idpuc');
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->timestamp('fecha_registro')->useCurrent();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrapartida_puc');
    }
};
