<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViajePaquetesCocineros extends Model
{
    use HasFactory;
    protected $fillable = ['monto_pagar', 'viaje_paquetes_id', 'cocinero_id'];
}
