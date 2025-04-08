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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade'); 
            $table->foreignId('servicios_id')->constrained('servicios')->onDelete('cascade'); 
            $table->date('fecha_asignacion'); 
            $table->date('fecha_finalizacion')->nullable(); 
            $table->enum('estado', ['Pendiente', 'En proceso', 'Finalizado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
