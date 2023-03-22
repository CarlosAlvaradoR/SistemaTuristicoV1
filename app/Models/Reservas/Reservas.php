<?php

namespace App\Models\Reservas;

use DateTime;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservas extends Model
{
    use HasFactory;
    use HasSlug;
    protected $fillable = ['fecha_reserva', 'observacion','codigo_reserva' , 'slug', 'cliente_id', 'paquete_id', 'estado_reservas_id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['codigo_reserva'])
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public static function validarFechaMayorReserva($fecha)
    {
        $mensaje = 'Permitido';
        $title = '';
        $icon = '';
        $message = '';

        $hoy = new DateTime(now());
        $fecha = new DateTime($fecha);
        $resultado = date_diff($hoy, $fecha)->format('%R%a');
        if ($resultado < 0) {
            $mensaje = 'No permitido';
            $title = 'ALERTA !';
            $icon = 'warning';
            $message = 'No se puede reservar para una fecha menor a hoy. Sólo para la fecha actual o mayor.';
        }
        return [$mensaje, $title, $icon, $message];
    }

    public static function validarSiYaReservoParaUnaFecha($idCliente,$fecha){
        $consulta = DB::select("SELECT * FROM reservas WHERE cliente_id = ".$idCliente." AND fecha_reserva = '".$fecha."'");
        return count($consulta);
    }
}
