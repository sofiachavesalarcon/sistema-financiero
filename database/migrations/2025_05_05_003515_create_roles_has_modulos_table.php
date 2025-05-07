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
        Schema::create('roles_has_modulos', function (Blueprint $table) {
            $table->foreignId('rol_idrol')->constrained('roles', 'idrol');
            $table->foreignId('mod_idmod')->constrained('modulos', 'idmod');
            $table->foreignId('per_idper')->constrained('permisos', 'idper');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_has_modulos');
    }
};
