<?php

namespace Database\Seeders\Reservas;

use App\Models\Reservas\CuentaPagos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuentaPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cuenta = CuentaPagos::create(['numero_cuenta' => 'CAJA', 'tipo_pagos_id' => 1]);
    }
}
