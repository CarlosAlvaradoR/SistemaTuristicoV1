<?php

namespace Database\Seeders\Pedidos;

use App\Models\Pedidos\Bancos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancos = Bancos::create(['nombre_banco' => 'Banco de Comercio', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco de Crédito del Perú', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco Interamericano de Finanzas (BanBif)', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco Pichincha', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'BBVA', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Citibank Perú', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Interbank', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'MiBanco', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Scotiabank Perú', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco GNB Perú', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco Falabella', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco Ripley', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco Santander Perú', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Alfin Banco', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'ICBC PERU BANK', 'direccion' => 'SIN ESPECIFICAR']);
        $bancos = Bancos::create(['nombre_banco' => 'Banco de la Nación', 'direccion' => 'SIN ESPECIFICAR']);
    }
}
