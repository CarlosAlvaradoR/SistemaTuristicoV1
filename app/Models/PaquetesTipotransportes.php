<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaquetesTipotransportes extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'cantidad', 'idpaqueteturistico', 'idtipotrasnporte'];
}
