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
        Schema::create('traslado_viajes', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->date('fecha');
            $table->decimal('monto', 10,2);

            $table->unsignedBigInteger('viaje_paquetes_id');
            $table->foreign('viaje_paquetes_id')->references('id')->on('viaje_paquetes');

            $table->unsignedBigInteger('vehiculos_id');
            $table->foreign('vehiculos_id')->references('id')->on('vehiculos');

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
        Schema::dropIfExists('traslado_viajes');
    }
};
