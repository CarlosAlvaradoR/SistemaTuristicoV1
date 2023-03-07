<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\Pagos;

use App\Models\Personas;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use App\Models\Reservas\TipoPagos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PagosPendientes extends Component
{
    use WithFileUploads;



    public $reserva, $idReserva, $reserva_object;
    public $datos = "", $paquete = "", $costo_paquete = 0, $monto_pagado = 0;
    public $informacion, $monto_restante = 0, $idBoleta;
    public $monto_pago, $fecha_de_pago, $numero_operacion, $estado_de_pago, $ruta_archivo_pago, $tipo_de_pago; //Para insertar pagos


    protected $rules = [
        'monto_pago' => 'required',
        'fecha_de_pago' => 'required',
        'estado_de_pago' => 'required|in:EN PROCESO,ACEPTADO,NO ACEPTADO',
        'tipo_de_pago' => 'required',
    ];


    public function mount($reserva_id)
    {
        $this->idReserva = $reserva_id;
        $this->reserva_object = Reservas::findOrFail($reserva_id);
        $cliente = DB::select("SELECT p.dni, concat(p.nombre,' ', p.apellidos)  as datos, 
        r.id as idRes ,r.paquete_id 
        FROM personas p
        INNER JOIN clientes c on p.id = c.persona_id
        INNER JOIN reservas r on c.id = r.cliente_id
        WHERE r.id = " . $reserva_id . " LIMIT 1");

        $paquete = DB::select("SELECT p.nombre, p.precio FROM paquetes_turisticos p
        WHERE id = " . $cliente[0]->paquete_id . "");

        $this->reserva = DB::select("SELECT * FROM reservas WHERE id = " . $cliente[0]->idRes . " LIMIT 1");

        $this->datos = $cliente[0]->datos;
        $this->paquete = $paquete[0]->nombre;
        $this->costo_paquete = $paquete[0]->precio;
    }


    public function render()
    {
        $this->monto_pagado = DB::select("SELECT SUM(p.monto) as MontoPagado FROM pagos p
        WHERE p.reserva_id = " . $this->idReserva ."");

        $pagos = DB::select("SELECT p.fecha_pago, p.monto, p.numero_de_operacion, p.estado_pago,
        p.ruta_archivo_pago,tp.nombre_tipo_pago, b.numero_boleta, b.id as idBoleta 
        FROM reservas r
        INNER JOIN pagos p on r.id=p.reserva_id
        INNER JOIN tipo_pagos tp on tp.id = p.tipo_pagos_id
        INNER JOIN boletas b on b.id = p.boleta_id
        WHERE r.id =" . $this->idReserva . "");

        $this->monto_restante = $this->costo_paquete - $this->monto_pagado[0]->MontoPagado;
        $this->idBoleta = $pagos[0]->idBoleta;
        $tipoPagos = TipoPagos::all();
        
        return view('livewire.reservas-admin.reservas.pagos.pagos-pendientes', compact('pagos', 'tipoPagos'));
    }

    public function GuardarPagoPorReserva()
    {
        $ruta = '';
        $this->validate();
        if ($this->ruta_archivo_pago) {
            $ruta = 'storage/' . $this->ruta_archivo_pago->store('archivo_pagos', 'public');
        }
        $pagos = Pagos::create([
            'monto' => $this->monto_pago,
            'fecha_pago' => $this->fecha_de_pago,
            'estado_pago' => $this->estado_de_pago,
            'ruta_archivo_pago' => $ruta, //$this->ruta_archivo_pago, 
            'reserva_id' => $this->idReserva,
            'tipo_pagos_id' => $this->tipo_de_pago,
            'boleta_id' => $this->idBoleta
        ]);

        return redirect()->route('reservas.pagos_restantes', [$this->reserva_object]);
    }

    public function editarPagoPorReserva()
    {
    }

    public function EliminarPagoPorReserva()
    {
    }
}
