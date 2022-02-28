<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idusuarios');
            $table->string('nombreusuario',150);
            $table->string('passwordusuario',150);

            $table->integer('idtipousuario')->unsigned();
            $table->integer('idpersona')->unsigned();

            $table->foreign('idtipousuario')->references('idtipousuario')->on('tipo_usuarios');
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
        Schema::dropIfExists('usuarios');
    }
}
