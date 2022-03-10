<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapasPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapas_paquetes', function (Blueprint $table) {
            $table->increments('idmapa_paquete');

            $table->integer('idmapareferencial')->unsigned();
            $table->integer('idpaqueteturistico')->unsigned();

            $table->foreign('idmapareferencial')->references('idmapareferencial')->on('mapasreferenciales');
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
        Schema::dropIfExists('mapas_paquetes');
    }
}
