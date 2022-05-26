<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcemilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acemilas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->decimal('precio', 10,2);

            $table->unsignedBigInteger('arriero_id');
            $table->foreign('arriero_id')->references('id')->on('arrieros');

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
        Schema::dropIfExists('acemilas');
    }
}
