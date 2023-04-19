<?php

namespace App\Models;

use App\Models\Viajes\Arrieros;
use App\Models\Viajes\Choferes;
use App\Models\Viajes\Cocineros;
use App\Models\Viajes\Guias;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;
    protected $fillable = ['dni', 'nombre', 'apellidos', 'genero', 'telefono', 'dirección'];

    public static function crear($datos)
    {
        $persona = Personas::create($datos);
        return $persona;
    }

    public static function verificaQueExista($persona_id, $opcion)
    {
        // $persona = Personas::findOrFail($persona_id);
        $existe = 0; //FALSE
        $clientes = Clientes::where('persona_id', $persona_id)->get();
        $cocineros = Cocineros::where('persona_id', $persona_id)->get();
        $arrieros = Arrieros::where('persona_id', $persona_id)->get();
        $guias = Guias::where('persona_id', $persona_id)->get();
        $choferes = Choferes::where('persona_id', $persona_id)->get();
        $usuarios = User::where('persona_id', $persona_id)->get();

        
        if ($opcion == 1) {
            $clientes = [];
        }
        if ($opcion == 2) {
            $cocineros = [];
        }
        if ($opcion == 3) {
            $arrieros = [];
        }
        if ($opcion == 4) {
            $guias = [];
        }
        if ($opcion == 5) {
            $choferes = [];
        }
        if ($opcion == 6) {
            $usuarios = [];
        }
        //dd($persona_id);
        if (
            (count($clientes) > 0) || (count($cocineros) > 0) || (count($arrieros) > 0) || (count($guias) > 0) || (count($choferes) > 0)
            || (count($usuarios) > 0)
        ) {
           $existe = 1; // TRUE
        }

        return $existe;
    }
}
