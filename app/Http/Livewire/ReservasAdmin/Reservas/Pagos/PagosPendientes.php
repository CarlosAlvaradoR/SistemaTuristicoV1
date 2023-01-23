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


    
    public $reserva;
    public $datos = "", $paquete = "", $costo_paquete = 0, $monto_pagado = 0;
    public $informacion, $monto_restante = 0, $idBoleta;
    public $monto_pago, $fecha_de_pago, $numero_operacion, $estado_de_pago, $ruta_archivo_pago, $tipo_de_pago; //Para insertar pagos


    protected $rules = [
        'monto_pago' => 'required',
        'fecha_de_pago' => 'required',
        'estado_de_pago' => 'required|in:EN PROCESO,ACEPTADO,NO ACEPTADO',
        'tipo_de_pago' => 'required',
    ];


    public function mount(Reservas $reserva)
    {
        $this->reserva = $reserva;
        $this->informacion = Personas::select(
            'personas.dni',
            DB::raw('CONCAT(personas.nombre," " ,personas.apellidos) AS datos'),
            'pt.nombre',
            'pt.precio',
            'r.fecha_reserva',
            //'b.monto',
            //'SUM(pa.monto) as pago',
            DB::raw('SUM(pa.monto) as pago'),
            'er.nombre_estado',
            'r.id',
            'b.id AS idBoleta'
        )
            ->join('clientes as c', 'personas.id', '=', 'c.persona_id')
            ->join('reservas  as r', 'r.cliente_id', '=', 'c.id')
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('estado_reservas as er', 'er.id', '=', 'r.estado_reservas_id')
            ->join('pagos as pa', 'pa.reserva_id', '=', 'r.id')
            ->join('boletas as b', 'pa.reserva_id', '=', 'b.id')
            ->groupBy('pa.reserva_id')
            ->orderBy('r.updated_at','DESC')
            ->where('r.id','=',$this->reserva->id)
            ->limit(1)
            ->first();
        $this->datos = $this->informacion->datos;
        $this->paquete = $this->informacion->nombre;
        $this->costo_paquete = $this->informacion->precio;
        $this->monto_pagado = $this->informacion->pago;
        $this->idBoleta = $this->informacion->idBoleta;
        
        $this->monto_restante = $this->informacion->precio - $this->informacion->pago;
    }


    public function render()
    {
        $pagos = DB::select("SELECT p.fecha_pago, p.monto, p.numero_de_operacion, p.estado_pago,
        p.ruta_archivo_pago,tp.nombre_tipo_pago, b.numero_boleta 
        FROM reservas r
        INNER JOIN pagos p on r.id=p.reserva_id
        INNER JOIN tipo_pagos tp on tp.id = p.tipo_pagos_id
        INNER JOIN boletas b on b.id = p.boleta_id
        WHERE r.id =". $this->reserva->id."");
        $tipoPagos=TipoPagos::all();
        return view('livewire.reservas-admin.reservas.pagos.pagos-pendientes', compact('pagos','tipoPagos'));
    }

    public function GuardarPagoPorReserva(){
        $ruta = '';
        $this->validate();
        if ($this->ruta_archivo_pago) {
            $ruta = 'storage/'.$this->ruta_archivo_pago->store('archivo_pagos','public');
        }
        $pagos = Pagos::create([
            'monto' => $this->monto_pago, 
            'fecha_pago' => $this->fecha_de_pago, 
            'estado_pago' => $this->estado_de_pago,
            'ruta_archivo_pago' => $ruta,//$this->ruta_archivo_pago, 
            'reserva_id' => $this->reserva->id, 
            'tipo_pagos_id' => $this->tipo_de_pago, 
            'boleta_id' => $this->idBoleta
        ]);

        return redirect()->route('reservas.pagos_restantes',[$this->reserva->id]);
    }

    public function editarPagoPorReserva(){

    }

    public function EliminarPagoPorReserva(){
        
    }
}

