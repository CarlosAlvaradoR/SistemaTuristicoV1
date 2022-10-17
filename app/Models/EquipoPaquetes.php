<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoPaquetes extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'observacion', 'equipo_id', 'paquete_id'];
}
