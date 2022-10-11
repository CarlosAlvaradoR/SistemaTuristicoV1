<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtractivosTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atractivos_turisticos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_atractivo');
            $table->text('descripcion');

            $table->unsignedBigInteger('lugar_id');
            $table->foreign('lugar_id')->references('id')->on('lugares');

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
        Schema::dropIfExists('atractivos_turisticos');
    }
}
