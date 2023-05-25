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
        Schema::create('solicitud_pagos', function (Blueprint $table) {
            $table->id();
            $table->enum('estdo_solicitud', ['DEVUELTO', 'NO DEVUELTO']);
            $table->text('observacion')->nullable();

            $table->unsignedBigInteger('solicitud_devolucion_dinero_id');
            $table->foreign('solicitud_devolucion_dinero_id')->references('id')->on('solicitud_devolucion_dineros');

            $table->unsignedBigInteger('pagos_id');
            $table->foreign('pagos_id')->references('id')->on('pagos');

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
        Schema::dropIfExists('solicitud_pagos');
    }
};
