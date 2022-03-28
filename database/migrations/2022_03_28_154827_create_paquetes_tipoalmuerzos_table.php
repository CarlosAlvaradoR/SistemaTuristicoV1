<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTipoalmuerzosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_tipoalmuerzos', function (Blueprint $table) {
            $table->increments('idpaquete_tipoalmuerzo');
            $table->text('observacion');

            $table->integer('idtipoalmuerzo')->unsigned();
            $table->foreign('idtipoalmuerzo')->references('idtipoalmuerzo')->on('tiposalmuerzos');

            $table->integer('idpaqueteturistico')->unsigned();
            $table->foreign('idpaqueteturistico')->references('idpaqueteturistico')->on('paquetes_turisticos');


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
        Schema::dropIfExists('paquetes_tipoalmuerzos');
    }
}
