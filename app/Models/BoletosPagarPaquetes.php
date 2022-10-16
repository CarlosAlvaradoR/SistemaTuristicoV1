<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletosPagarPaquetes extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'precio', 'paquete_id'];
}
