<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionDineros extends Model
{
    use HasFactory;
    protected $fillable = ['monto', 'observacion', 'fecha_hora', 'solicitud_pagos_id'];
}
