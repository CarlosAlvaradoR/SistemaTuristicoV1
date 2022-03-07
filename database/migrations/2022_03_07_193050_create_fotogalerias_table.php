<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotogaleriasTable extends Migration
{
    
    public function up()
    {
        Schema::create('fotogalerias', function (Blueprint $table) {
            $table->increments('idfotogaleria');
            $table->string('descripcionfoto', 55);
            $table->string('imagen',55); //Ruta de la Imagen
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('fotogalerias');
    }
}
