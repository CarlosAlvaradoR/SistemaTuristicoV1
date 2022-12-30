<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipotransportePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipotransporte_paquetes', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('cantidad');

            $table->unsignedBigInteger('tipotransporte_id');
            $table->foreign('tipotransporte_id')->references('id')->on('tipo_transportes');

            $table->unsignedBigInteger('paquete_id');
            $table->foreign('paquete_id')->references('id')->on('paquetes_turisticos');

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
        Schema::dropIfExists('tipotransporte_paquetes');
    }
}
