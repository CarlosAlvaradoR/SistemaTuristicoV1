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
        Schema::create('serie_comprobantes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_serie');
            $table->enum('estado', ['ACTIVO', 'INACTIVO']);

            $table->unsignedBigInteger('tipo_comprobantes_id')->nullable();
            $table->foreign('tipo_comprobantes_id')->references('id')->on('tipo_comprobantes');

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
        Schema::dropIfExists('serie_comprobantes');
    }
};
