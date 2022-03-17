<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItinerariosPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerarios_paquetes', function (Blueprint $table) {
            $table->increments('itinerarios_paquetes');

            $table->string('descripcion', 150);

            $table->integer('idpaqueteturistico')->unsigned();
            $table->foreign('idpaqueteturistico')->references('idpaqueteturistico')->on('paquetes_turisticos');


            $table->integer('idactividaditinerario')->unsigned();
            $table->foreign('idactividaditinerario')->references('idactividaditinerario')->on('actividadesitinerarios');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('itinerarios_paquetes');
    }
}
