<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocineros extends Model
{
    use HasFactory;
    protected $fillable = ['persona_id'];
}
