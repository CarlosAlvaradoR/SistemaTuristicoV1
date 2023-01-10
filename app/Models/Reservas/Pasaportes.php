<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasaportes extends Model
{
    use HasFactory;
    protected $fillable = ['numero_pasaporte', 'ruta_archivo_pasaporte', 'cliente_id'];
}
