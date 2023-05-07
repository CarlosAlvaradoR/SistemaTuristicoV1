<?php

namespace Database\Seeders\Reservas;

use App\Models\Reservas\TipoPagos;
use App\Models\Viajes\Asociaciones;
use App\Models\Viajes\Hoteles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipo_pago = TipoPagos::create(['nombre_tipo_pago' => 'PRESENCIAL']);
        // $asociaciones = Asociaciones::create(['nombre' => 'YUNGAY ALTO', 'estado' => 'En cumplimiento']);
        // $asociaciones = Asociaciones::create(['nombre' => 'RECUAY HERMOSO', 'estado' => 'En cumplimiento']);
        // $asociaciones = Asociaciones::create(['nombre' => 'LOS ANDES ALPES', 'estado' => 'En cumplimiento']);

        $hoteles = Hoteles::create(['nombre' => 'EL CIELO', 'direccion' => 'AV. LOS ALPES', 'telefono' => 999, 'email' => 'h.com']);
        $hoteles = Hoteles::create(['nombre' => 'EL CIELO 2', 'direccion' => 'AV. LOS ALPES', 'telefono' => 999, 'email' => 'h.com']);
    }
}
