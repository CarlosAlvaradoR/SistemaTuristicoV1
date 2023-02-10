<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViajePaquetesGuias extends Model
{
    use HasFactory;
    protected $fillable = ['monto_pagar', 'viaje_paquetes_id', 'guias_id'];
}
