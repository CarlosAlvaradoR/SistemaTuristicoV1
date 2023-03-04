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
        Schema::create('postergacion_reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_postergacion');
            $table->text('descripcion_motivo');

            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas');

            $table->unsignedBigInteger('evento_postergaciones_id')->nullable();
            $table->foreign('evento_postergaciones_id')->references('id')->on('evento_postergaciones');

            $table->unsignedBigInteger('cancelacion_viajes_id')->nullable();
            $table->foreign('cancelacion_viajes_id')->references('id')->on('cancelacion_viajes');
            
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
        Schema::dropIfExists('postergacion_reservas');
    }
};
