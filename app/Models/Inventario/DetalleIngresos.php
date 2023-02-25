<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngresos extends Model
{
    use HasFactory;
    protected $fillable = ['obervacion', 'cantidad', 'ingreso_pedidos_id', 'detalle_pedidos_id'];
}
