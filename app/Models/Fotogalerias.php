<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotogalerias extends Model
{
    use HasFactory;
    protected $fillable = ['descripcionfoto', 'imagen'];
}
