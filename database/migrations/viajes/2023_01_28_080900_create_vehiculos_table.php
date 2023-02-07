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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_placa', 10);
            $table->text('descripcion');

            $table->unsignedBigInteger('empresa_transportes_id');
            $table->foreign('empresa_transportes_id')->references('id')->on('empresa_transportes');

            $table->unsignedBigInteger('tipo_vehiculos_id');
            $table->foreign('tipo_vehiculos_id')->references('id')->on('tipo_vehiculos');
            
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
        Schema::dropIfExists('vehiculos');
    }
};
