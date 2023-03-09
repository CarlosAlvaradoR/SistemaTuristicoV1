<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPagos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_tipo_pago'];
}
