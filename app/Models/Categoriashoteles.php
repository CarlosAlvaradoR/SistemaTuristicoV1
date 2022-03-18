<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriashoteles extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'idpaqueteturistico'];
}
