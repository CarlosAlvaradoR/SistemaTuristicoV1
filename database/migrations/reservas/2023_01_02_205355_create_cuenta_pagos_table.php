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
        Schema::create('cuenta_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_cuenta', 45);

            $table->unsignedBigInteger('tipo_pagos_id')->nullable();
            $table->foreign('tipo_pagos_id')->references('id')->on('tipo_pagos');
            
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
        Schema::dropIfExists('cuenta_pagos');
    }
};
