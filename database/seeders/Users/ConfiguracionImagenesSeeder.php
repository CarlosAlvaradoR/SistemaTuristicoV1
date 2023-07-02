<?php

namespace Database\Seeders\Users;

use App\Models\ConfiguracionImagenes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfiguracionImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ConfiguracionImagenes::create(['ruta_de_imagen' => '', 'descripcion_de_ayuda' => 'Imagen Grande']);
        ConfiguracionImagenes::create(['ruta_de_imagen' => '', 'descripcion_de_ayuda' => 'Imagen Pequeña']);
    }
}
