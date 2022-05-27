<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrasladoViajes extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'fecha', 'monto', 'viaje_paquete_id', 'vehiculo_id'];
}
