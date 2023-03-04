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
        Schema::create('solicitud_devolucion_dineros', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_presentacion');
            $table->string('estado');
            $table->text('observacion')->nullable();

            $table->unsignedBigInteger('postergacion_reservas_id')->nullable();
            $table->foreign('postergacion_reservas_id')->references('id')->on('postergacion_reservas');
            
            $table->unsignedBigInteger('pagos_id');
            $table->foreign('pagos_id')->references('id')->on('pagos');

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
        Schema::dropIfExists('solicitud_devolucion_dineros');
    }
};
