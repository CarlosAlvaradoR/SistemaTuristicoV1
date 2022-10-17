<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoalmuerzoPaquetes extends Model
{
    use HasFactory;
    protected $fillable = ['observacion', 'tipo_almuerzo_id', 'paquete_id'];
}
