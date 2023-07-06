<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionesGenerales extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_de_la_empresa', 'direccion_de_la_empresa', 'telefono_de_contacto_de_la_empresa',
        'correo_de_contacto_de_la_empresa', 'direccion_del_mapa_en_google_maps'
    ];
}
