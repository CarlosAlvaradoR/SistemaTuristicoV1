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
        Schema::create('archivo_comprobantes', function (Blueprint $table) {
            $table->id();
            $table->text('ruta_archivo');
            $table->boolean('validez');
            $table->string('codigo_archivo');
            $table->text('slug');

            $table->unsignedBigInteger('comprobante_id');
            $table->foreign('comprobante_id')->references('id')->on('comprobante_pagos');


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
        Schema::dropIfExists('archivo_comprobantes');
    }
};
