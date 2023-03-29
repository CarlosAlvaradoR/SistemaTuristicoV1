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
        Schema::create('solicitud_devolucion_dineros', function (Blueprint $table) {
            $table->id();
            $table->string('pedido', 45);
            $table->date('fecha_presentacion');
            $table->enum('estado', ['POR PROCESAR', 'PROCESADO'])->default('POR PROCESAR');
            $table->text('descripcion_solicitud')->nullable();

            $table->unsignedBigInteger('postergacion_reservas_id');
            $table->foreign('postergacion_reservas_id')->references('id')->on('postergacion_reservas');
            
            
            

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
        Schema::dropIfExists('solicitud_devolucion_dineros');
    }
};
