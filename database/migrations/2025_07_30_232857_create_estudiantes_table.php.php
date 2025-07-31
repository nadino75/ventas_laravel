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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('ci')->unique();
            $table->string('correo')->unique();
            $table->integer('telefono');
            $table->string('direccion');
            $table->date('fecha_nacimiento')->unique();
            $table->string('genero');
            $table->string('carrera');
            $table->integer('anio_ingreso');
            $table->string('estado');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
