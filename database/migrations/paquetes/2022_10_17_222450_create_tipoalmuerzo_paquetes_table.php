<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoalmuerzoPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoalmuerzo_paquetes', function (Blueprint $table) {
            $table->id();
            $table->text('observacion');

            $table->unsignedBigInteger('tipo_almuerzo_id');
            $table->foreign('tipo_almuerzo_id')->references('id')->on('tipo_almuerzos');

            $table->unsignedBigInteger('paquete_id');
            $table->foreign('paquete_id')->references('id')->on('paquetes_turisticos');

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
        Schema::dropIfExists('tipoalmuerzo_paquetes');
    }
}
