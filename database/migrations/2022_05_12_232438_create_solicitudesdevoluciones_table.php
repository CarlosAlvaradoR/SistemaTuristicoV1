<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesdevolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudesdevoluciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_presentacion');
            $table->integer('estado');

            $table->integer('idreserva')->unsigned();
            $table->foreign('idreserva')->references('idreserva')->on('reservas');

            $table->timestamps();
        });
    }
    //https://es.stackoverflow.com/questions/368836/error-1215-cannot-add-foreign-key-constraint-al-ejecutar-el-comando-php-artis
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudesdevoluciones');
    }
}
