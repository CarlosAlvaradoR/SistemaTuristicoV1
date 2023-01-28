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
        Schema::create('arrieros', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');

            $table->unsignedBigInteger('asociaciones_id');
            $table->foreign('asociaciones_id')->references('id')->on('asociaciones');

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
        Schema::dropIfExists('arrieros');
    }
};
