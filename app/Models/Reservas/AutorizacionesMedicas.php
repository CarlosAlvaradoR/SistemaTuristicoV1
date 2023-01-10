<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizacionesMedicas extends Model
{
    use HasFactory;
    protected $fillable = ['numero_autorizacion', 'ruta_archivo', 'reserva_id'];
}
