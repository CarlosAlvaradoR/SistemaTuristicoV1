<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesItinerarios extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_actividad','paquete_id'];
}
