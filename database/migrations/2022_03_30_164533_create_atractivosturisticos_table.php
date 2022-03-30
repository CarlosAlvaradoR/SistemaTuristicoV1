<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtractivosturisticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atractivosturisticos', function (Blueprint $table) {
            $table->increments('idatractivoturistico');
            $table->text('descripcion');

            $table->integer('idlugar')->unsigned();
            $table->foreign('idlugar')->references('idlugar')->on('lugares');

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
        Schema::dropIfExists('atractivosturisticos');
    }
}
