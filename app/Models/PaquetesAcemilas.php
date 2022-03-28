<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaquetesAcemilas extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'idtipoacemila', 'idpaqueteturistico'];
}
