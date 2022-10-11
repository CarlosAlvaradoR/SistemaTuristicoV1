<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoGalerias extends Model
{
    use HasFactory;
    
    protected $fillable = ['descripcion', 'directorio', 'paquete_id'];
}
