<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;
    protected $fillable = ['monto', 'fecha_pago', 'numero_de_operacion','estado_pago', 'observacion_del_pago', 'ruta_archivo_pago', 'reserva_id', 'cuenta_pagos_id', 'boleta_id'];
}
