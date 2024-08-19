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
        Schema::table('proyectos', function (Blueprint $table) {
            $table->date('fecha_inicio'); // Columna para la fecha de inicio
            $table->string('responsable'); // Columna para el nombre del responsable
            $table->unsignedInteger('monto'); // Columna para el monto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('fecha_inicio');
            $table->dropColumn('responsable');
            $table->dropColumn('monto');
        });
    }
};
