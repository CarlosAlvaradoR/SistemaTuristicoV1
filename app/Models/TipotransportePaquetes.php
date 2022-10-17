<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipotransportePaquetes extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'cantidad','tipotransporte_id','paquete_id'];
}
