<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaquetesTipoalmuerzos extends Model
{
    use HasFactory;
    protected $fillable = ['observacion', 'idtipoalmuerzo', 'idpaqueteturistico'];
}
