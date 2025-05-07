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
        Schema::create('puc', function (Blueprint $table) {
            $table->id('idpuc');
            $table->string('puc_codigo', 45);
            $table->string('puc_descripcion', 255);
            $table->enum('puc_naturaleza', ['Deudora', 'Acreedora']);
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puc');
    }
};
