<?php

namespace Database\Seeders\Users;

use App\Models\ConfiguracionesGenerales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfiguracionesGeneralesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $configuracion = ConfiguracionesGenerales::create(
            [
                'nombre_de_la_empresa' => 'TRAVELO',
                'direccion_de_la_empresa' => '',
                'telefono_de_contacto_de_la_empresa' => '',
                'correo_de_contacto_de_la_empresa' => '',
                'direccion_del_mapa_en_google_maps' => '<iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.8561138943655!2d-77.53092518565303!3d-9.521228102652996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a90d12eb234bf1%3A0xc860f66d7ad8abd9!2sUNIVERSIDAD%20NACIONAL%20SANTIAGO%20ANT%C3%9ANEZ%20DE%20MAYOLO!5e0!3m2!1ses!2spe!4v1675462860289!5m2!1ses!2spe"
                width="1100" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>'
            ]
        );
    }
}
