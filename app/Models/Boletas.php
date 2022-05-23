<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletas extends Model
{
    use HasFactory;
    protected $fillable = ['numero', 'observaciones', 'monto', 'fecha_emision'];
}
