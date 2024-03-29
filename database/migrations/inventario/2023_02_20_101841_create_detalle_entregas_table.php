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
        Schema::create('detalle_entregas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->text('observacion')->nullable();
            $table->integer('cantidad_devuelta')->nullable(1);

            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');

            $table->unsignedBigInteger('entrega_equipos_id');
            $table->foreign('entrega_equipos_id')->references('id')->on('entrega_equipos');


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
        Schema::dropIfExists('detalle_entregas');
    }
};
