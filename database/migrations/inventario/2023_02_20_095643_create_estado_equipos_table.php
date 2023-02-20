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
        Schema::create('estado_equipos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->date('fecha_registro');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('pedidos');

            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('estados');


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
        Schema::dropIfExists('estado_equipos');
    }
};
