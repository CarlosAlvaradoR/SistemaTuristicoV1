<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistentes extends Model
{
    use HasFactory;
    protected $fillable = ['participantes_id', 'actividades_aclimataciones_id'];
}
