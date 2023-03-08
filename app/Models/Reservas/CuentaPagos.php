<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaPagos extends Model
{
    use HasFactory;
    protected $fillable = ['numero_cuenta', 'tipo_pagos_id'];
}
