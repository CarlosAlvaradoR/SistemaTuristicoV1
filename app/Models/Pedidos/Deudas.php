<?php

namespace App\Models\Pedidos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deudas extends Model
{
    use HasFactory;
    protected $fillable=['monto_deuda', 'estado', 'comprobante_id'];
}
