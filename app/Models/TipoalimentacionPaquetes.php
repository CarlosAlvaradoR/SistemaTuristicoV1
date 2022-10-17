<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoalimentacionPaquetes extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'tipoalimentacion_id', 'paquete_id'];
}
