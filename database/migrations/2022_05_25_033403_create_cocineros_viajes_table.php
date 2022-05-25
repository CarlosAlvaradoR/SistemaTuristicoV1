<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocinerosViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocineros_viajes', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_pagar', 10,2);

            $table->unsignedBigInteger('viaje_paquete_id');
            $table->foreign('viaje_paquete_id')->references('id')->on('viajes_paquetes');

            $table->unsignedBigInteger('cocinero_id');
            $table->foreign('cocinero_id')->references('id')->on('cocineros');
            
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
        Schema::dropIfExists('cocineros_viajes');
    }
}
