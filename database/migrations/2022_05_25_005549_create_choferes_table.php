<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_licencia');
            
            $table->integer('idpersona')->unsigned();
            $table->foreign('idpersona')->references('idpersona')->on('personas');

            $table->unsignedBigInteger('tipolicencia_id');
            $table->foreign('tipolicencia_id')->references('id')->on('tipo_licencias');
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
        Schema::dropIfExists('choferes');
    }
}
