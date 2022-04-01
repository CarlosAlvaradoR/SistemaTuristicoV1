<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('idcliente');

            $table->integer('idnacionalidad')->unsigned();
            $table->foreign('idnacionalidad')->references('idnacionalidad')->on('nacionalidades');

            $table->integer('idpersona')->unsigned();
            $table->foreign('idpersona')->references('idpersona')->on('personas');
            
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
        Schema::dropIfExists('clientes');
    }
}
