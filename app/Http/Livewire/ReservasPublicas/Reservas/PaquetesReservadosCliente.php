<?php

namespace App\Http\Livewire\ReservasPublicas\Reservas;

use Livewire\WithFileUploads;
use App\Models\Personas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaquetesReservadosCliente extends Component
{
    use WithFileUploads;

    
    public $title = '';
    public $idReserva, $monto, $fecha_pago, $numero_de_operacion, $ruta_archivo_pago;
    public $idCuentaPago, $forma_de_pago;
    public $idBoleta;

    public function render()
    {
        $tipo_pagos = DB::table('tipo_pagos as tp')
            ->join('cuenta_pagos as cp', 'cp.tipo_pagos_id', '=', 'tp.id')
            ->select('tp.nombre_tipo_pago', 'cp.id', 'cp.numero_cuenta')
            ->where('tp.id', '!=', 1)
            ->get();

        $cliente = Clientes::select('id')
            ->where('user_id', '=', Auth::user()->id)
            ->limit(1)
            ->first();

        $paquetes_comprados = Personas::select(
            'personas.dni',
            DB::raw('CONCAT(personas.nombre," " ,personas.apellidos) AS datos'),
            'pt.nombre',
            'r.fecha_reserva',
            //'b.monto',
            //'SUM(pa.monto) as pago',
            DB::raw('SUM(pa.monto) as pago'),
            'er.nombre_estado',
            'r.id',
            'r.slug'
        )
            ->join('clientes as c', 'personas.id', '=', 'c.persona_id')
            ->join('reservas  as r', 'r.cliente_id', '=', 'c.id')
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('estado_reservas as er', 'er.id', '=', 'r.estado_reservas_id')
            ->join('pagos as pa', 'pa.reserva_id', '=', 'r.id')
            //->join('boletas as b', 'pa.reserva_id', '=', 'r.id')
            ->where('c.id', '=', $cliente->id)
            ->groupBy('pa.reserva_id')
            ->orderBy('r.updated_at', 'DESC')
            ->get();

        if ($this->idReserva) {
            $pagos = DB::select("SELECT p.id as idPago, p.fecha_pago, p.monto, p.numero_de_operacion, p.estado_pago, p.observacion_del_pago,
            p.ruta_archivo_pago,tp.nombre_tipo_pago, cp.numero_cuenta, b.numero_boleta, b.id as idBoleta 
            FROM reservas r
            INNER JOIN pagos p on r.id=p.reserva_id
            INNER JOIN cuenta_pagos cp on cp.id = p.cuenta_pagos_id
            INNER JOIN tipo_pagos tp on tp.id = cp.tipo_pagos_id
            INNER JOIN boletas b on b.id = p.boleta_id
            WHERE r.id =" . $this->idReserva . "");
            $this->idBoleta = $pagos[0]->idBoleta;
        }

        return view('livewire.reservas-publicas.reservas.paquetes-reservados-cliente', compact('paquetes_comprados', 'tipo_pagos'));
    }

    public function addPayment(Reservas $reserva)
    {
        //EL ENVÍO POR CORREO {{}}
        $this->title = 'AÑADIR PAGOS RESTANTES';
        $this->idReserva = $reserva->id;
        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function savePayment()
    {
        //$this->validate();
        $ruta = '';
        if ($this->ruta_archivo_pago) {
            $ruta = 'storage/' . $this->ruta_archivo_pago->store('archivo_pagos', 'public');
        }

        $pago = Pagos::create([
            'monto' => $this->monto,
            'fecha_pago' => $this->fecha_pago,
            'numero_de_operacion' => $this->numero_de_operacion,
            //'estado_pago', //AUTOMÁTICO
            //'observacion_del_pago', //ADMIN
            'ruta_archivo_pago' => $ruta,
            'reserva_id' => $this->idReserva,
            'cuenta_pagos_id' => $this->idCuentaPago,
            'boleta_id' => $this->idBoleta
        ]);

    }

    public function select($idCuentaPago)
    {
        $tipo_pago = DB::table('tipo_pagos as tp')
            ->join('cuenta_pagos as cp', 'cp.tipo_pagos_id', '=', 'tp.id')
            ->select('tp.nombre_tipo_pago', 'cp.id', 'cp.numero_cuenta')
            ->where('tp.id', '!=', 1)
            ->where('cp.id', $idCuentaPago)
            ->get();
        $this->idCuentaPago = $tipo_pago[0]->id;
        $this->forma_de_pago = $tipo_pago[0]->nombre_tipo_pago . ' - ' . $tipo_pago[0]->numero_cuenta;
    }

    public function resetUI()
    {
    }
}
