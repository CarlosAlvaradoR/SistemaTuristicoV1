<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViajePaquetes extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'fecha', 'hora', 'cantidad_participantes', 'estado', 'paquete_id'];
}
