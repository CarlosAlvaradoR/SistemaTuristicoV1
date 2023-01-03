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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto',10,2);
            $table->date('fecha_pago');
            $table->string('ruta_archivo_pago')->nullable();

            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas');

            $table->unsignedBigInteger('tipo_pagos_id');
            $table->foreign('tipo_pagos_id')->references('id')->on('tipo_pagos');

            $table->unsignedBigInteger('boleta_id')->nullable();
            $table->foreign('boleta_id')->references('id')->on('boletas');
            
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
        Schema::dropIfExists('pagos');
    }
};
