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
        Schema::create('serie_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numero_de_serie');
            $table->enum('estado', ['VÁLIDO', 'NO VÁLIDO']);
            $table->text('motivo_de_baja')->nullable();

            $table->unsignedBigInteger('serie_comprobantes_id');
            $table->foreign('serie_comprobantes_id')->references('id')->on('serie_comprobantes');


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
        Schema::dropIfExists('serie_pagos');
    }
};
