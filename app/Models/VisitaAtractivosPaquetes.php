<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaAtractivosPaquetes extends Model
{
    use HasFactory;
    protected $fillable=['atractivo_id', 'paquete_id'];
}
