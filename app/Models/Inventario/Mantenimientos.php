<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimientos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_salida_mantenimiento', 'cantidad', 'observacion', 'equipo_id'];

}
