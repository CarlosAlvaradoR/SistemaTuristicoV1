<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntregas extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'observacion', 'cantidad_devuelta', 'equipo_id', 'entrega_equipos_id'];
}
