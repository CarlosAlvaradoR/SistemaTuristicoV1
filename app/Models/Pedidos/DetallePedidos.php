<?php

namespace App\Models\Pedidos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedidos extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'precio_real', 'pedidos_id', 'equipo_id'];
}
