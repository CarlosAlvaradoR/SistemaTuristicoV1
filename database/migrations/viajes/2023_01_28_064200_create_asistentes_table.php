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
        Schema::create('asistentes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('participantes_id');
            $table->foreign('participantes_id')->references('id')->on('participantes');

            $table->unsignedBigInteger('actividades_aclimataciones_id');
            $table->foreign('actividades_aclimataciones_id')->references('id')->on('actividades_aclimataciones');

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
        Schema::dropIfExists('asistentes');
    }
};
