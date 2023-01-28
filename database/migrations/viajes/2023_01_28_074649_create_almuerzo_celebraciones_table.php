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
        Schema::create('almuerzo_celebraciones', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->decimal('monto', 10,2);

            $table->unsignedBigInteger('asociaciones_id');
            $table->foreign('asociaciones_id')->references('id')->on('asociaciones');

            $table->unsignedBigInteger('viaje_paquetes_id');
            $table->foreign('viaje_paquetes_id')->references('id')->on('viaje_paquetes');

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
        Schema::dropIfExists('almuerzo_celebraciones');
    }
};
