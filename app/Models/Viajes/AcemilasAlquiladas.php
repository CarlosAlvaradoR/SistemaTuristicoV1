<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcemilasAlquiladas extends Model
{
    use HasFactory;
    protected $fillable = ['monto', 'cantidad', 'viaje_paquetes_id', 'arrieros_id', 'tipo_acemilas_id'];
}
