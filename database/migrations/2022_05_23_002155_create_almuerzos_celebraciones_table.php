<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmuerzosCelebracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almuerzos_celebraciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->decimal('monto', 10,2);

            $table->unsignedBigInteger('viaje_paquete_id');
            $table->foreign('viaje_paquete_id')->references('id')->on('viajes_paquetes');

            $table->unsignedBigInteger('asociacion_id');
            $table->foreign('asociacion_id')->references('id')->on('asociaciones');
            
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
        Schema::dropIfExists('almuerzos_celebraciones');
    }
}
