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
        Schema::create('devolucion_dineros', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto',10,2)->nullable();
            $table->text('observacion')->nullable();
            $table->dateTime('fecha_hora')->nullable();

            $table->unsignedBigInteger('solicitud_pagos_id')->nullable();
            $table->foreign('solicitud_pagos_id')->references('id')->on('solicitud_pagos');


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
        Schema::dropIfExists('devolucion_dineros');
    }
};
