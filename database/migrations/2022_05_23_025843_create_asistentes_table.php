<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistentesTable extends Migration
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

            $table->unsignedBigInteger('actividad_aclimatacion_id');
            $table->foreign('actividad_aclimatacion_id')->references('id')->on('actividades_aclimataciones');

            $table->unsignedBigInteger('viaje_participante_id');
            $table->foreign('viaje_participante_id')->references('id')->on('viaje_participantes');

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
}
