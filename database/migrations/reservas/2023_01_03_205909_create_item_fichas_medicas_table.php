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
        Schema::create('item_fichas_medicas', function (Blueprint $table) {
            $table->id();
            $table->boolean('evaluacion')->default(0);

            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas');

            $table->unsignedBigInteger('criterios_medicos_id')->nullable();
            $table->foreign('criterios_medicos_id')->references('id')->on('criterios_medicos');


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
        Schema::dropIfExists('item_fichas_medicas');
    }
};
