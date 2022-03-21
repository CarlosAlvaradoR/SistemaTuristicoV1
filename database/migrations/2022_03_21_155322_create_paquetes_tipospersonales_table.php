<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTipospersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_tipospersonales', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');

            $table->integer('idtipopersonal')->unsigned();
            $table->foreign('idtipopersonal')->references('idtipopersonal')->on('tipospersonales');

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
        Schema::dropIfExists('paquetes_tipospersonales');
    }
}
