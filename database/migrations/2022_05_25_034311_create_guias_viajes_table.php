<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias_viajes', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_pagar', 10,2);

            $table->unsignedBigInteger('viaje_paquete_id');
            $table->foreign('viaje_paquete_id')->references('id')->on('viajes_paquetes');

            $table->unsignedBigInteger('guia_id');
            $table->foreign('guia_id')->references('id')->on('guias');

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
        Schema::dropIfExists('guias_viajes');
    }
}
