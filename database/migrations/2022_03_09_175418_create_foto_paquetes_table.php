<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_paquetes', function (Blueprint $table) {
            $table->increments('idfoto_paquete');
            
            $table->integer('idfotogaleria')->unsigned();
            $table->integer('idpaqueteturistico')->unsigned();

            $table->foreign('idfotogaleria')->references('idfotogaleria')->on('fotogalerias');
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
        Schema::dropIfExists('foto_paquetes');
    }
}
