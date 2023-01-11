<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiesgosAceptados extends Model
{
    use HasFactory;
    protected $fillable = ['estado_aceptacion', 'riesgos_id', 'reserva_id'];
}
