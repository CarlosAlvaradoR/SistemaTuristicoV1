<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement("CREATE OR REPLACE VIEW v_reserva_lista_clientes_registrados AS
        SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos,  p.telefono, c.id as idCliente FROM personas p
        LEFT JOIN clientes c on p.id = c.persona_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_reserva_lista_clientes_registrados;");
    }
};
