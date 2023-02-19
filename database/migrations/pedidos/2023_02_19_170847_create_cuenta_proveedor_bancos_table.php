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
        Schema::create('cuenta_proveedor_bancos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_cuenta', 45);
            $table->integer('estado');

            $table->unsignedBigInteger('proveedores_id');
            $table->foreign('proveedores_id')->references('id')->on('proveedores');

            $table->unsignedBigInteger('bancos_id');
            $table->foreign('bancos_id')->references('id')->on('bancos');

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
        Schema::dropIfExists('cuenta_proveedor_bancos');
    }
};
