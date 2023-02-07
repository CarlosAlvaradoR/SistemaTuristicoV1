<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choferes extends Model
{
    use HasFactory;
    protected $fillable = ['numero_licencia', 'tipo_licencias_id', 'persona_id'];
}
