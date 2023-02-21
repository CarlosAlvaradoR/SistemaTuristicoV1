<?php

namespace App\Models\Pedidos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'monto', 'observación_pedido', 'proveedores_id', 'estado_pedidos_id'];
}
