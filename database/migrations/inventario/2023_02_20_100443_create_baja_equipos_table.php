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
        Schema::create('baja_equipos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_baja');
            $table->text('motivo_baja');
            $table->integer('cantidad');

            
            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');

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
        Schema::dropIfExists('baja_equipos');
    }
};
