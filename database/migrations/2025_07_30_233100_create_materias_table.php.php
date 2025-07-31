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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudiantes')->nullable();
            $table->string('codigo_materia')->unique();
            $table->string('nombre_materia');
            $table->string('grupo');
            $table->string('docente');
            $table->string('semestre');
            $table->string('turno');
            $table->date('fecha_solicitud');
            $table->string('motivo');
            $table->string('estado');
            $table->string('observaciones');
            $table->timestamps();
            

            $table->foreign('id_estudiantes')->references('id')->on('estudiantes')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
