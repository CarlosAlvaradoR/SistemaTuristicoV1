<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesVisitaatractivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_visitaatractivos', function (Blueprint $table) {
            $table->increments('idpaquete_visitaatractivos');
            
            $table->integer('idatractivoturistico')->unsigned();
            $table->foreign('idatractivoturistico')->references('idatractivoturistico')->on('atractivosturisticos');

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
        Schema::dropIfExists('paquetes_visitaatractivos');
    }
}
