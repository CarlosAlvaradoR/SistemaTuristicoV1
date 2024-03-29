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
        Schema::create('autorizaciones_presentadas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_autorizacion');
            $table->string('ruta_archivo');

            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas');

            $table->unsignedBigInteger('autorizaciones_medicas_id')->nullable();
            $table->foreign('autorizaciones_medicas_id')->references('id')->on('autorizaciones_medicas');
            
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
        Schema::dropIfExists('autorizaciones_presentadas');
    }
};
