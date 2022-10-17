<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoacemilaPaquetes extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'tipo_acemila_id', 'paquete_id'];
}
