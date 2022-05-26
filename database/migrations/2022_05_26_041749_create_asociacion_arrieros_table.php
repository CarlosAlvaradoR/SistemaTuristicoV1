<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsociacionArrierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacion_arrieros', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('arriero_id');
            $table->foreign('arriero_id')->references('id')->on('arrieros');

            $table->unsignedBigInteger('asociacion_id');
            $table->foreign('asociacion_id')->references('id')->on('asociaciones');
            
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
        Schema::dropIfExists('asociacion_arrieros');
    }
}
