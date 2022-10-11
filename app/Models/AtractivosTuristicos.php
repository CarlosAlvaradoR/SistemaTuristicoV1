<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtractivosTuristicos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_atractivo', 'descripcion', 'lugar_id'];
}
