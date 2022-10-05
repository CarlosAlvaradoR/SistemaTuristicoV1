<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPaquetes extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
}
