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
        Schema::create('ingreso_pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->text('observacion')->nullable();

            $table->unsignedBigInteger('pedidos_id');
            $table->foreign('pedidos_id')->references('id')->on('pedidos');

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
        Schema::dropIfExists('ingreso_pedidos');
    }
};
