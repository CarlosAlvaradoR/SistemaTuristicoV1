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
            $table->string('numero_de_operacion',25)->nullable();
            $table->enum('estado_pago', ['EN PROCESO', 'ACEPTADO','NO ACEPTADO']);
            $table->text('observacion_del_pago')->nullable();
            $table->string('ruta_archivo_pago')->nullable();

            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas');

            $table->unsignedBigInteger('cuenta_pagos_id');
            $table->foreign('cuenta_pagos_id')->references('id')->on('cuenta_pagos');

            $table->unsignedBigInteger('boleta_id')->nullable();
            $table->foreign('boleta_id')->references('id')->on('boletas');

            $table->unsignedBigInteger('serie_pagos');
            $table->foreign('serie_pagos')->references('id')->on('serie_pagos');
            
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
