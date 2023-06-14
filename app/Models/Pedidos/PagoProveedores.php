<?php

namespace App\Models\Pedidos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoProveedores extends Model
{
    use HasFactory;
    protected $fillable = ['monto_equipos', 'fecha_pago', 'numero_depósito', 'ruta_archivo', 'validez_pago', 'comprobante_id', 'cuenta_proveedor_bancos_id'];
}
