<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaEquipos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_entrega', 'hora_entrega', 'fecha_devoluvion', 'hora_devolucion', 'estado', 'participantes_id'];
}
