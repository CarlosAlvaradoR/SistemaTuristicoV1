<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrieros', function (Blueprint $table) {
            $table->id();

            $table->decimal('monto_pagar', 10,2);

            $table->unsignedBigInteger('viaje_paquete_id');
            $table->foreign('viaje_paquete_id')->references('id')->on('viajes_paquetes');

            $table->unsignedBigInteger('asociacion_id');
            $table->foreign('asociacion_id')->references('id')->on('asociaciones');

            $table->integer('idpersona')->unsigned();
            $table->foreign('idpersona')->references('idpersona')->on('personas');

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
        Schema::dropIfExists('arrieros');
    }
}
