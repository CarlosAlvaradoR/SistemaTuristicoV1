<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_turisticos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 55);
            $table->decimal('precio', 10,2);
            $table->decimal('precio_dolares', 10,2);
            $table->integer('estado');
            $table->string('imagen_principal', 100);
            $table->string('slug')->unique();

            $table->unsignedBigInteger('tipo_paquete_id');
            $table->foreign('tipo_paquete_id')->references('id')->on('tipo_paquetes');
            
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
        Schema::dropIfExists('paquetes_turisticos');
    }
}
