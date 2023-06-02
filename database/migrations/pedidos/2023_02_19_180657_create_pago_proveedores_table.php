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
        Schema::create('pago_proveedores', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_equipos', 10,2);
            $table->date('fecha_pago');
            $table->string('numero_depósito');
            $table->string('ruta_archivo');
            $table->boolean('validez_pago');
            // $table->decimal('monto_deuda', 10,2);

            $table->unsignedBigInteger('comprobante_id')->nullable();
            $table->foreign('comprobante_id')->references('id')->on('comprobante_pagos');

            $table->unsignedBigInteger('cuenta_proveedor_bancos_id');
            $table->foreign('cuenta_proveedor_bancos_id')->references('id')->on('cuenta_proveedor_bancos');

            // $table->unsignedBigInteger('deuda_id')->nullable();
            // $table->foreign('deuda_id')->references('id')->on('deudas');

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
        Schema::dropIfExists('pago_proveedores');
    }
};
