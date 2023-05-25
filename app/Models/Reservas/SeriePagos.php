<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriePagos extends Model
{
    use HasFactory;
    protected $fillable = ['numero_de_serie', 'estado', 'serie_comprobantes_id'];


    public static function siguienteNumero($serie)
    {
        $serie_activa = SerieComprobantes::where('estado', 'ACTIVO')->firstOrFail();

        $boletaNumeracion = self::where('serie_comprobantes_id', $serie_activa->id)->firstOrFail();
        $numeroActual = $boletaNumeracion->numero_de_serie;
        $boletaNumeracion->numero_de_serie = $numeroActual + 1;
        $boletaNumeracion->save();

        return $numeroActual + 1;
    }
}
