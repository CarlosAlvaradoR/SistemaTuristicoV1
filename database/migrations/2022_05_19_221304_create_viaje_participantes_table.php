<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajeParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaje_participantes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('viaje_id');
            $table->foreign('viaje_id')->references('id')->on('viajes_paquetes');

            $table->integer('idreserva')->unsigned();
            $table->foreign('idreserva')->references('idreserva')->on('reservas');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estado_participantes');

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
        Schema::dropIfExists('viaje_participantes');
    }
}
