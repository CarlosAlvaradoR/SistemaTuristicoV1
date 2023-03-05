<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPagos extends Model
{
    use HasFactory;
    protected $fillable = ['estdo_solicitud', 'observacion', 'solicitud_devolucion_dinero_id', 'pagos_id'];
}
