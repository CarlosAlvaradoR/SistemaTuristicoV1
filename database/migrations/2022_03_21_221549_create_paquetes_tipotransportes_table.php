<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTipotransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_tipotransportes', function (Blueprint $table) {
            $table->increments('idpaquete_tipotransporte');
            $table->text('descripcion');
            $table->integer('cantidad');

            $table->integer('idpaqueteturistico')->unsigned();
            $table->foreign('idpaqueteturistico')->references('idpaqueteturistico')->on('paquetes_turisticos');

            $table->integer('idtipotrasnporte')->unsigned();
            $table->foreign('idtipotrasnporte')->references('idtipotrasnporte')->on('tipotransportes');
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
        Schema::dropIfExists('paquetes_tipotransportes');
    }
}
