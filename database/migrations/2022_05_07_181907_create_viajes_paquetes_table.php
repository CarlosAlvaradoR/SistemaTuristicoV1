<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes_paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('cantidad_participantes');
            $table->integer('estado');

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
        Schema::dropIfExists('viajes_paquetes');
    }
}
