<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicionesAceptadas extends Model
{
    use HasFactory;
    protected $fillable = ['aceptacion_condicion', 'condicion_puntualidades_id', 'reserva_id'];
}
