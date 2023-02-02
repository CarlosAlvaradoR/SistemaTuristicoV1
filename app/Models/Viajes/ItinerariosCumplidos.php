<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItinerariosCumplidos extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado',
        'fecha_cumplimiento',
        'itinerario_paquetes_id',
        'viaje_paquetes_id'
    ];
}
