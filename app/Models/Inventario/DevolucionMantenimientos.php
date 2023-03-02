<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionMantenimientos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_entrada_equipo', 'cantidad_equipos_arreglados_buen_estado', 'observacion', 'mantenimientos_id'];
}
