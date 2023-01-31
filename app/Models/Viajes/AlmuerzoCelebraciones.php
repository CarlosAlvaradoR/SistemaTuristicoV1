<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmuerzoCelebraciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'cantidad',
        'monto',
        'asociaciones_id',
        'viaje_paquetes_id'
    ];
}
