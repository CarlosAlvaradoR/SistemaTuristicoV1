<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_reserva', 'observacion', 'cliente_id', 'paquete_id', 'estado_reservas_id'];
}
