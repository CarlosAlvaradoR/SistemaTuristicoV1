<?php

namespace App\Models\Pedidos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobantePagos extends Model
{
    use HasFactory;
    protected $fillable = ['numero_comprobante', 'fecha_emision', 'pedidos_id', 'tipo_comprobante_id'];
}
