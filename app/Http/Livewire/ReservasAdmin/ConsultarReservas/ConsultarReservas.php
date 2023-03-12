<?php

namespace App\Http\Livewire\ReservasAdmin\ConsultarReservas;

use App\Models\Personas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ConsultarReservas extends Component
{
    public $search;
    public $valor = 0;

    public function render()
    {
        $reservas = Personas::select(
            'personas.dni',
            DB::raw('CONCAT(personas.nombre," " ,personas.apellidos) AS datos'),
            'pt.nombre',
            'r.fecha_reserva',
            //'b.monto',
            //'SUM(pa.monto) as pago',
            DB::raw('SUM(pa.monto) as pago'),
            DB::raw('(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) as aceptado'),
            DB::raw('(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "NO ACEPTADO" AND ps.reserva_id = r.id) as no_aceptado'),
            DB::raw('(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) as en_proceso'),
            'er.nombre_estado',
            'r.id',
            'r.slug',
            DB::raw('IF((fecha_reserva-curdate()) <=10 ,"PRÓXIMA A CUMPLIRSE","EN DETERMINACIÓN") as estado_reserva')
        )
            ->join('clientes as c', 'personas.id', '=', 'c.persona_id')
            ->join('reservas  as r', 'r.cliente_id', '=', 'c.id')
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('estado_reservas as er', 'er.id', '=', 'r.estado_reservas_id')
            ->join('pagos as pa', 'pa.reserva_id', '=', 'r.id')
            ->where('personas.dni', $this->search)
            //->join('boletas as b', 'pa.reserva_id', '=', 'r.id')
            ->groupBy('pa.reserva_id')
            ->orderBy('r.updated_at', 'DESC')
            ->get();
            //dd($reservas);
        $this->valor = count($reservas);
        return view('livewire.reservas-admin.consultar-reservas.consultar-reservas', compact('reservas'));
    }

    public function search(){
        $this->render();   
    }
}
