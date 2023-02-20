<?php

namespace App\Models\Pedidos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaProveedorBancos extends Model
{
    use HasFactory;
    protected $fillable = ['numero_cuenta', 'estado', 'proveedores_id', 'bancos_id'];
}
