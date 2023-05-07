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
        Schema::create('item_fichas_medicas', function (Blueprint $table) {
            $table->id();
            $table->boolean('evaluacion')->default(0);

            $table->unsignedBigInteger('criterios_medicos_id')->nullable();
            $table->foreign('criterios_medicos_id')->references('id')->on('criterios_medicos');

            $table->unsignedBigInteger('autorizaciones_presentadas_id')->nullable();
            $table->foreign('autorizaciones_presentadas_id')->references('id')->on('autorizaciones_presentadas');

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
        Schema::dropIfExists('item_fichas_medicas');
    }
};
