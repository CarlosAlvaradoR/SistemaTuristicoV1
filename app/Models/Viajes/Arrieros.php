<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrieros extends Model
{
    use HasFactory;
    protected $fillable = ['persona_id', 'asociaciones_id'];
}
