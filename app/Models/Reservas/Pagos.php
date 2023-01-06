<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;
    protected $fillable = ['monto', 'fecha_pago', 'ruta_archivo_pago', 'reserva_id', 'tipo_pagos_id', 'boleta_id'];
}
