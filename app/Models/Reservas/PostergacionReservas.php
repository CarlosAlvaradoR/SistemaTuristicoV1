<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostergacionReservas extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_postergacion', 'descripcion_motivo', 'reserva_id', 'evento_postergaciones_id'];
}
