<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmuerzosCelebraciones extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'cantidad', 'monto', 'viaje_paquete_id', 'asociacion_id'];
}
