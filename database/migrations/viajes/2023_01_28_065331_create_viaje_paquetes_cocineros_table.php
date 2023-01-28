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
        Schema::create('viaje_paquetes_cocineros', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_pagar', 10,2);

            $table->unsignedBigInteger('viaje_paquetes_id');
            $table->foreign('viaje_paquetes_id')->references('id')->on('viaje_paquetes');

            $table->unsignedBigInteger('cocinero_id')->nullable();
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
        Schema::dropIfExists('viaje_paquetes_cocineros');
    }
};
