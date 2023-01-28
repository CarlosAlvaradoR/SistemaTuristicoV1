<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaje_paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 55);
            $table->date('fecha');
            $table->time('hora');
            $table->integer('cantidad_participantes');
            $table->integer('estado'); //ABIERTO Y CERRADO

            $table->unsignedBigInteger('paquete_id');
            $table->foreign('paquete_id')->references('id')->on('paquetes_turisticos');

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
        Schema::dropIfExists('viaje_paquetes');
    }
};
