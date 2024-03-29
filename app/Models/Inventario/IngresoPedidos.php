<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoPedidos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_ingreso', 'observacion', 'pedidos_id'];
}
