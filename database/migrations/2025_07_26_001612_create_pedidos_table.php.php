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
        $table->id();
        $table->unsignedBigInteger('cliente_id');
        $table->date('fecha');
        $table->string('estado');
        $table->timestamps();

        $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
