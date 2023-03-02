<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BajaEquipos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_baja', 'motivo_baja', 'cantidad', 'equipo_id'];
}
