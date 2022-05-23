<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choferes extends Model
{
    use HasFactory;
    protected $fillable = ['licencia_conducir', 'tipo', 'idpersona', 'vehiculo_id'];
}
