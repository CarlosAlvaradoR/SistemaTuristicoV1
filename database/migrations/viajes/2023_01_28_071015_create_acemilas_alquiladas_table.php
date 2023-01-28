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
        Schema::create('acemilas_alquiladas', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto', 10,2);
            $table->integer('cantidad');

            $table->unsignedBigInteger('viaje_paquetes_id');
            $table->foreign('viaje_paquetes_id')->references('id')->on('viaje_paquetes');

            $table->unsignedBigInteger('arrieros_id');
            $table->foreign('arrieros_id')->references('id')->on('arrieros');

            $table->unsignedBigInteger('tipo_acemilas_id');
            $table->foreign('tipo_acemilas_id')->references('id')->on('tipo_acemilas');

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
        Schema::dropIfExists('acemilas_alquiladas');
    }
};
