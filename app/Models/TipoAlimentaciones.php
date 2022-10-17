<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAlimentaciones extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
}
