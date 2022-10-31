<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    
    protected $fillable = ['fecha_reserva','observacion','monto' ,'cliente_id', 'paquete_id'];
}