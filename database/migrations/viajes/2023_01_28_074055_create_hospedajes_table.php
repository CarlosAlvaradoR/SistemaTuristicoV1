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
        Schema::create('hospedajes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->decimal('monto', 10,2);

            $table->unsignedBigInteger('viaje_paquetes_id');
            $table->foreign('viaje_paquetes_id')->references('id')->on('viaje_paquetes');

            $table->unsignedBigInteger('hoteles_id');
            $table->foreign('hoteles_id')->references('id')->on('hoteles');

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
        Schema::dropIfExists('hospedajes');
    }
};
