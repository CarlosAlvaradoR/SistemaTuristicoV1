<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id();
            $table->text('obervacion')->nullable();
            $table->integer('cantidad'); //cantidad que ingresa al pedido

            $table->unsignedBigInteger('ingreso_pedidos_id');
            $table->foreign('ingreso_pedidos_id')->references('id')->on('ingreso_pedidos');

            $table->unsignedBigInteger('detalle_pedidos_id');
            $table->foreign('detalle_pedidos_id')->references('id')->on('detalle_pedidos');

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
        Schema::dropIfExists('detalle_ingresos');
    }
};
