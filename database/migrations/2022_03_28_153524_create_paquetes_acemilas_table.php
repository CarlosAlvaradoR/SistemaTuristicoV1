<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesAcemilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_acemilas', function (Blueprint $table) {
            $table->increments('idpaquete_acemila');
            $table->integer('cantidad');

            $table->integer('idtipoacemila')->unsigned();
            $table->foreign('idtipoacemila')->references('idtipoacemila')->on('tiposacemilas');

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
        Schema::dropIfExists('paquetes_acemilas');
    }
}
