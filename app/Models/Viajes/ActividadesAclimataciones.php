<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesAclimataciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'fecha',
        'monto',
        'viaje_paquetes_id'
    ];
}
