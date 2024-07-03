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
        Schema::create('asistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_id')->unsigned(); // solo permitir enteros positivos
            $table->integer('estudiante_id')->unsigned();
            $table->date('fecha')->nulleable(false);
            $table->time('hora_entrada')->nulleable(false);

            $table->foreign('grupo_id')->references('id')->on('grupo'); 
            $table->foreign('estudiante_id')->references('id')->on('estudiante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia');
    }
};
