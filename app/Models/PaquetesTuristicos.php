<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaquetesTuristicos extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'precio', 'estado', 'imagen_principal', 'slug', 'tipo_paquete_id'];
}
