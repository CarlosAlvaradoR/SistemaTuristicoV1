<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoacemilaPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoacemila_paquetes', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');

            $table->unsignedBigInteger('tipo_acemila_id');
            $table->foreign('tipo_acemila_id')->references('id')->on('tipo_acemilas');

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
        Schema::dropIfExists('tipoacemila_paquetes');
    }
}
