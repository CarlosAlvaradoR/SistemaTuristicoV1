<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapasPaquetes extends Model
{
    use HasFactory;

    protected $fillable = ['imagen_ruta', 'idmapareferencial','idpaqueteturistico'];
    
}
