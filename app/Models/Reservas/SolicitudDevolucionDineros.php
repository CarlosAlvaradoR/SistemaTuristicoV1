<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudDevolucionDineros extends Model
{
    use HasFactory;
    protected $fillable = ['pedido', 'fecha_presentacion', 'estado', 'descripcion_solicitud', 'postergacion_reservas_id'];
}
