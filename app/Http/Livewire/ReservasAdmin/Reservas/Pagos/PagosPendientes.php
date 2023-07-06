<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\Pagos;

use App\Models\Personas;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use App\Models\Reservas\TipoPagos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PagosPendientes extends Component
{
    use WithFileUploads;



    public $reserva, $idReserva, $reserva_object;
    public $datos = "", $paquete = "", $costo_paquete = 0, $monto_pagado = 0;
    public $informacion, $monto_restante = 0, $idBoleta, $idSeriePagos;
    public $identificador;
    public $idPago, $monto_pago, $fecha_de_pago, $observacion_del_pago, $numero_operacion, $estado_de_pago, $ruta_archivo_pago, $tipo_de_pago; //Para insertar pagos
    public $url_image;


    protected $rules = [
        'monto_pago' => 'required||regex:/^\d+(\.\d{1,2})?$/',
        'fecha_de_pago' => 'required|date',
        'estado_de_pago' => 'required|in:EN PROCESO,ACEPTADO,NO ACEPTADO',
        'tipo_de_pago' => 'required|numeric|min:1'
    ];

    function resetUI()
    {
        $this->reset([
            'idPago', 'monto_pago', 'fecha_de_pago', 'observacion_del_pago', 'numero_operacion', 'estado_de_pago', 'ruta_archivo_pago',
            'tipo_de_pago', 'url_image'
        ]);
    }

    public function mount($reserva_id)
    {
        $this->identificador = rand();

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
        WHERE p.reserva_id = " . $this->idReserva . "");

        $pagos = DB::select("SELECT p.id as idPago, p.fecha_pago, p.monto, p.numero_de_operacion, p.estado_pago, p.observacion_del_pago,
        p.ruta_archivo_pago,tp.nombre_tipo_pago, cp.numero_cuenta, b.numero_boleta, b.id as idBoleta, sc.numero_serie,
        sp.numero_de_serie, sp.id as idSeriePagos
        FROM reservas r
        INNER JOIN pagos p on r.id=p.reserva_id
        INNER JOIN cuenta_pagos cp on cp.id = p.cuenta_pagos_id
        INNER JOIN tipo_pagos tp on tp.id = cp.tipo_pagos_id
        INNER JOIN boletas b on b.id = p.boleta_id
        INNER JOIN serie_pagos sp on sp.id = p.serie_pagos
        INNER JOIN serie_comprobantes sc on sc.id = sp.serie_comprobantes_id
        WHERE r.id =" . $this->idReserva . "");

        $this->monto_restante = $this->costo_paquete - $this->monto_pagado[0]->MontoPagado;
        $this->idBoleta = $pagos[0]->idBoleta;//
        $this->idSeriePagos = $pagos[0]->idSeriePagos;//idSeriePagos
        //$tipoPagos = TipoPagos::all();
        $tipoPagos = DB::table('tipo_pagos as tp')
            ->join('cuenta_pagos as cp', 'tp.id', '=', 'cp.tipo_pagos_id')
            ->select('tp.nombre_tipo_pago', 'cp.id as idCuentaPago', 'cp.numero_cuenta')
            ->get();

        return view('livewire.reservas-admin.reservas.pagos.pagos-pendientes', compact('pagos', 'tipoPagos'));
    }

    public function savePago()
    {
        $ruta = '';
        $this->validate();
        /*if ($this->ruta_archivo_pago) {
            $ruta = 'storage/' . $this->ruta_archivo_pago->store('archivo_pagos', 'public');
        }*/


        if ($this->idPago) {
            # Actualizar

            $pago = Pagos::findOrFail($this->idPago);
            if ($this->ruta_archivo_pago) {
                $eliminar = Storage::disk('private')->delete($pago->ruta_archivo_pago);
                $filename = uniqid() . '_' . time() . rand(1, 1000);

                //$image = $this->ruta_archivo_pago->getRealPath();
                $ext = $this->ruta_archivo_pago->getClientOriginalExtension();

                $ruta = $this->ruta_archivo_pago->storeAs('archivo', $filename . '.' . $ext, 'private');
                //$ruta = Storage::disk('private')->putFileAs('photos', $image, $filename);;
            } else {
                $ruta = $pago->ruta_archivo_pago;
            }
            $pago->monto = $this->monto_pago;
            $pago->fecha_pago = $this->fecha_de_pago;
            $pago->numero_de_operacion = $this->numero_operacion;
            $pago->estado_pago = $this->estado_de_pago;
            $pago->observacion_del_pago = $this->observacion_del_pago;
            $pago->ruta_archivo_pago = $ruta;
            $pago->cuenta_pagos_id = $this->tipo_de_pago;
            $pago->save();
        } else {
            # Crear
            if ($this->ruta_archivo_pago) {
                $filename = uniqid() . '_' . time() . rand(1, 1000);

                //$image = $this->ruta_archivo_pago->getRealPath();
                $ext = $this->ruta_archivo_pago->getClientOriginalExtension();

                $ruta = $this->ruta_archivo_pago->storeAs('archivo', $filename . '.' . $ext, 'private');
                //$ruta = Storage::disk('private')->putFileAs('photos', $image, $filename);;
            }

            $pagos = Pagos::create([
                'monto' => $this->monto_pago,
                'fecha_pago' => $this->fecha_de_pago,
                'numero_de_operacion' => $this->numero_operacion, //numero_de_operacion
                'estado_pago' => $this->estado_de_pago,
                'observacion_del_pago' => $this->observacion_del_pago,
                'ruta_archivo_pago' => $ruta, //$this->ruta_archivo_pago, 
                'reserva_id' => $this->idReserva,
                'cuenta_pagos_id' => $this->tipo_de_pago,
                'boleta_id' => $this->idBoleta,
                'serie_pagos' => $this->idSeriePagos
            ]);
        }

        $this->identificador = rand();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Equipo Creado Correctamente'
        ]);

        $this->resetUI();
        //return redirect()->route('reservas.pagos_restantes', [$this->reserva_object]);
    }

    public function seguimientoPago(Pagos $pago)
    {
        //dd($pago);
        $this->idPago = $pago->id;
        $this->monto_pago = $pago->monto;
        $this->fecha_de_pago = $pago->fecha_pago;
        $this->estado_de_pago = $pago->estado_pago;
        $this->observacion_del_pago = $pago->observacion_del_pago;
        $this->url_image = $pago->ruta_archivo_pago;
        $this->tipo_de_pago = $pago->cuenta_pagos_id;

        $this->emit('show-modal', 'Edicion de Pago');
    }

    public function Update()
    {
    }

    public function EliminarPagoPorReserva()
    {
    }
}
