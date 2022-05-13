<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventopostergacionesReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventopostergaciones_reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_postergacion');
            
            $table->integer('idreserva')->unsigned();
            $table->foreign('idreserva')->references('idreserva')->on('reservas');

            $table->unsignedBigInteger('evento_id');
            $table->foreign('evento_id')->references('id')->on('eventopostergaciones');

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
        Schema::dropIfExists('eventopostergaciones_reservas');
    }
}
