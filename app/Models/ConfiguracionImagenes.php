<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionImagenes extends Model
{
    use HasFactory;
    protected $fillable = ['ruta_de_imagen', 'descripcion_de_ayuda'];
}
