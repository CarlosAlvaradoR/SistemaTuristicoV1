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
        Schema::create('configuraciones_generales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_de_la_empresa')->nullable();
            $table->text('direccion_de_la_empresa')->nullable();
            $table->text('telefono_de_contacto_de_la_empresa')->nullable();
            $table->text('correo_de_contacto_de_la_empresa')->nullable();
            $table->text('direccion_del_mapa_en_google_maps')->nullable();
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
        Schema::dropIfExists('configuraciones_generales');
    }
};
