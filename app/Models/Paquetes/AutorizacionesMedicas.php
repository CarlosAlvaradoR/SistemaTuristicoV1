<?php

namespace App\Models\Paquetes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizacionesMedicas extends Model
{
    use HasFactory;
    protected $fillable = ['detalle_de_archivos', 'paquete_id'];
}
