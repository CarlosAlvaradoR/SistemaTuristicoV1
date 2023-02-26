<?php

namespace App\Models\Pedidos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivoComprobantes extends Model
{
    use HasFactory;
    protected $fillable = ['ruta_archivo', 'validez', 'comprobante_id'];
}