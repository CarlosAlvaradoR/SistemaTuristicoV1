<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospedajes extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_inicial', 'fecha_final', 'monto', 'viaje_paquetes_id', 'hoteles_id'];
}
