<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoChoferes extends Model
{
    use HasFactory;
    protected $fillable = ['vehiculos_id', 'choferes_id'];
}
