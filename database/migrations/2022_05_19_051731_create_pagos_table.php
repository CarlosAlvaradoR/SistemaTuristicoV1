<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('boleta_id');
            $table->foreign('boleta_id')->references('id')->on('boletas');

            $table->unsignedBigInteger('factura_id');
            $table->foreign('factura_id')->references('id')->on('facturas');

            $table->unsignedBigInteger('paypalpagos_id');
            $table->foreign('paypalpagos_id')->references('id')->on('paypalpagos');

            $table->integer('idreserva')->unsigned();
            $table->foreign('idreserva')->references('idreserva')->on('reservas');

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
        Schema::dropIfExists('pagos');
    }
}
