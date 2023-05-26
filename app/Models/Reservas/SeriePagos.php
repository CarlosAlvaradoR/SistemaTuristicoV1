<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class SeriePagos extends Model
{
    use HasFactory;
    protected $fillable = ['numero_de_serie', 'estado', 'serie_comprobantes_id'];


    public static function RegistrarSiguienteNumeroComprobante($id_tipo_de_comprobante)
    {
        $serie_activa = SerieComprobantes::where('estado', 'ACTIVO')
            ->where('tipo_comprobantes_id', $id_tipo_de_comprobante)
            ->firstOrFail();

        //Serie Pagos::
        $boletaNumeracion = self::where('serie_comprobantes_id', $serie_activa->id)
            ->latest('id')
            ->first();
        
        $numeroActual = 0;
        if (!is_null($boletaNumeracion)) {
            $numeroActual = $boletaNumeracion->numero_de_serie + 1;
        }

        # Field, Type, Null, Key, Default, Extra
        // 'estado', 'enum(\'\',\'NO VÁLIDO\')', 'NO', '', NULL, ''

        $serie_pagos = self::create(
            [
                'numero_de_serie' => $numeroActual,
                'estado' => 'VÁLIDO',
                'serie_comprobantes_id' => $serie_activa->id //BOLETA LA QUE TIENE EL ID 1
            ]
        );
        return $serie_pagos;
    }
}
