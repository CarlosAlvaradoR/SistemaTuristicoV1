<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerieComprobantes extends Model
{
    use HasFactory;
    protected $fillable = ['numero_serie', 'estado', 'tipo_comprobantes_id'];
}
