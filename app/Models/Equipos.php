<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'stock', 'precio_referencial', 'tipo', 'marca_id'];

    public static function diferenciaStock($stock, $cantidad){//Verifica si la resta entre dos cantidades es menor o igual a cero
        $diferencia = $stock - $cantidad;
        return $diferencia;
    }
}
