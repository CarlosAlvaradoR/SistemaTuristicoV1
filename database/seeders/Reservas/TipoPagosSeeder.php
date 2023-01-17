<?php

namespace Database\Seeders\Reservas;

use App\Models\Reservas\TipoPagos;
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
    }
}
