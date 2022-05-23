<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewVistaParticipantesPagadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement("CREATE OR REPLACE VIEW V_Reservas AS
            SELECT concat(p.nombres,' ' ,p.apellidos) as datos, r.idreserva, r.idpaqueteturistico, 
            SUM(b.monto) as montopagado, (pt.precio-SUM(b.monto)) as diferencia, vp.viaje_id FROM personas p
            INNER JOIN clientes c on p.idpersona=c.idpersona
            INNER JOIN reservas r on r.idcliente=c.idcliente
            INNER JOIN pagos pa on pa.idreserva=r.idreserva
            INNER JOIN boletas b on pa.boleta_id=b.id
            INNER JOIN viaje_participantes vp on r.idreserva=vp.idreserva
            INNER JOIN viajes_paquetes v on v.id=vp.viaje_id
            INNER JOIN paquetes_turisticos pt on pt.idpaqueteturistico=v.idpaqueteturistico
            GROUP BY r.idreserva");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS V_Reservas;");
    }
}
