<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalTipos extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'tipo_id', 'paquete_id'];
}
