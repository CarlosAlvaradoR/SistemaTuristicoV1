<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_equipos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_entrega');
            $table->time('hora_entrega');
            $table->date('fecha_devoluvion')->nullable();
            $table->time('hora_devolucion')->nullable();
            $table->enum('estado', ['COMPLETADO', 'PENDIENTE DE ENTREGAR']);

            $table->unsignedBigInteger('participantes_id');
            $table->foreign('participantes_id')->references('id')->on('participantes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_equipos');
    }
};
