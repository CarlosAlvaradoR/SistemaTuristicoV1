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
        Schema::create('itinerarios_cumplidos', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->default(0);
            $table->date('fecha_cumplimiento');

            $table->unsignedBigInteger('itinerario_paquetes_id');
            $table->foreign('itinerario_paquetes_id')->references('id')->on('itinerario_paquetes');

            $table->unsignedBigInteger('viaje_paquetes_id');
            $table->foreign('viaje_paquetes_id')->references('id')->on('viaje_paquetes');
            
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
        Schema::dropIfExists('itinerarios_cumplidos');
    }
};
