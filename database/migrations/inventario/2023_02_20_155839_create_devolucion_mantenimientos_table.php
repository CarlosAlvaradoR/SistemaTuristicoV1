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
        Schema::create('devolucion_mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_entrada_equipo');
            $table->integer('cantidad_equipos_arreglados_buen_estado');
            $table->text('observacion')->nullable();

            $table->unsignedBigInteger('mantenimientos_id');
            $table->foreign('mantenimientos_id')->references('id')->on('mantenimientos');

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
        Schema::dropIfExists('devolucion_mantenimientos');
    }
};
