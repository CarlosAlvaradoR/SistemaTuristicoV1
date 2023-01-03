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
        Schema::create('riesgos_aceptados', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado_aceptacion')->default(0);

            $table->unsignedBigInteger('riesgos_id');
            $table->foreign('riesgos_id')->references('id')->on('riesgos');

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
        Schema::dropIfExists('riesgos_aceptados');
    }
};
