<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesitinerariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividadesitinerarios', function (Blueprint $table) {
            $table->increments('idactividaditinerario');
            $table->string('nombreactividad',100);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('actividadesitinerarios');
    }
}
