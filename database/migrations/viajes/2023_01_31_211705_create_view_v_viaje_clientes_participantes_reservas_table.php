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
        DB::statement("CREATE OR REPLACE VIEW v_viaje_clientes_participantes_reservas AS
        SELECT concat(p.nombre,' ' ,p.apellidos) as datos, par.id, par.viaje_paquetes_id FROM personas p
        INNER JOIN clientes c on p.id = c.persona_id
        INNER JOIN reservas r on r.cliente_id = c.id
        INNER JOIN participantes par on par.reserva_id = r.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viaje_clientes_participantes_reservas;");  
    }
};
