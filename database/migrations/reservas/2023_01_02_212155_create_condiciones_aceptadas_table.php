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
        Schema::create('condiciones_aceptadas', function (Blueprint $table) {
            $table->id();
            $table->boolean('aceptacion_condicion')->default(0);

            $table->unsignedBigInteger('condicion_puntualidades_id');
            $table->foreign('condicion_puntualidades_id')->references('id')->on('condicion_puntualidades');

            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas');
            
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
        Schema::dropIfExists('condiciones_aceptadas');
    }
};
