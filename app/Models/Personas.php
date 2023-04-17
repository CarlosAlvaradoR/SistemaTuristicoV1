<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;
    protected $fillable = ['dni','nombre','apellidos', 'genero','telefono', 'dirección'];

    public static function crear($datos){
        $persona = Personas::create($datos);
        return $persona;
    }
}
