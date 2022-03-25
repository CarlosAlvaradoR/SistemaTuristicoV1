<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTipoalimentacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_tipoalimentaciones', function (Blueprint $table) {
            $table->increments('idpaquete_tipoalimentacion');
            $table->text('descripcion');

            $table->integer('idtipoalimentacion')->unsigned();
            $table->foreign('idtipoalimentacion')->references('idtipoalimentacion')->on('tipoalimentaciones');

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
        Schema::dropIfExists('paquetes_tipoalimentaciones');
    }
}
