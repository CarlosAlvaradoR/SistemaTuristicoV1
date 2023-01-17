<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudDevolucionDineros extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_presentacion', 'estado', 'observacion', 'reserva_id'];
}
