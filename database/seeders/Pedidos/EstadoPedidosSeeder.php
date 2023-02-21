<?php

namespace Database\Seeders\Pedidos;

use App\Models\Pedidos\EstadoPedidos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EstadoPedidos::create(['estado' => 'COMPLETADO']);
        EstadoPedidos::create(['estado' => 'NO COMPLETADO']);
    }
}
