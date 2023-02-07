<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;
    protected $fillable = ['numero_placa', 'descripcion', 'empresa_transportes_id', 'tipo_vehiculos_id'];
}
