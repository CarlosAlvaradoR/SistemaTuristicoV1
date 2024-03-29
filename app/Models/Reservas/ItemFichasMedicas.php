<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemFichasMedicas extends Model
{
    use HasFactory;
    protected $fillable = ['evaluacion', 'criterios_medicos_id', 'autorizaciones_presentadas_id'];
}
