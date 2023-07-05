<?php

namespace App\Http\Livewire\ReservasPublicas\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\CuentaPagos;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use App\Models\Reservas\SeriePagos;
use App\Models\Reservas\TipoPagos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioReservas extends Component
{
    use WithFileUploads;



    public $paquetesTuristicos; //ALL DATES THIS PACKAGES
    public $dni = "";
    public $buscar = '';
    public $archivos = [], $archivos_pago = [];
    public $cliente; //Datos del Cliente
    public $fecha_reserva, $observacion, $monto; //Para Insertar Reservas
    public $numero_operacion, $archivo_pago, $tipo_pago, $fecha_de_pago; //Para insertar en Pagos
    public $idCuentaPagos, $cuenta_seleccionada;
    public $precio = 0, $paquete_id = 0, $paquete;
    public $encontrado = false;


    protected $rules = [
        'fecha_reserva' => 'required|date',
        //'observacion' => 'nullable|min:5',
        'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'numero_operacion' => 'required|min:3|max:25',
        'archivo_pago' => 'required',
        //'tipo_pago' => 'required|numeric|min:2',
        'fecha_de_pago' => 'required|date',
        'cuenta_seleccionada' => 'required|string|min:1'
    ];


    public function mount(PaquetesTuristicos $paquetesTuristicos)
    {
        //Verificar si ya llenó una solicitud --> Si ya llenó verificar si ya llenó una devolución
        $this->paquetesTuristicos = $paquetesTuristicos;
        $this->cliente = Clientes::where('user_id', '=', Auth::user()->id)
            ->limit(1)
            ->get();
    }

    public function render()
    {
        $tipo_pagos = DB::table('tipo_pagos as tp')
            ->join('cuenta_pagos as cp', 'cp.tipo_pagos_id', '=', 'tp.id')
            ->select('tp.nombre_tipo_pago', 'cp.id', 'cp.numero_cuenta')
            ->where('tp.id', '!=', 1)
            ->get();
        //dd($tipo_pagos);
        return view('livewire.reservas-publicas.reservas.formulario-reservas', compact('tipo_pagos'));
    }

    public function selectedPayment(CuentaPagos $cuentaPagos)
    {
        // dd($cuentaPagos);
        $tipo_de_pago = TipoPagos::findOrFail($cuentaPagos->tipo_pagos_id);
        $this->idCuentaPagos = $cuentaPagos->id;

        $this->cuenta_seleccionada = $tipo_de_pago->nombre_tipo_pago.' - '.$cuentaPagos->numero_cuenta;
    }

    public function reservar()
    {
        $this->validate();
        list($mensaje, $title, $icon, $message) = Reservas::validarFechaMayorReserva($this->fecha_reserva);

        if ($mensaje == 'No permitido') {
            $this->alert($title, $icon, $message);
            return '';
        }

        $precio_minimo = $this->paquetesTuristicos->precio * 0.20;
        if ($this->monto < $precio_minimo) {
            session()->flash('mensaje-falla-pago', 'El pago debe de ser de al menos el 20 %');
            return;
        }

        $estado = 2; //PENDIENTE DE PAGO
        if ($this->monto == $this->paquetesTuristicos->precio) {
            $estado = 1;
        }
        $serie_pagos = SeriePagos::RegistrarSiguienteNumeroComprobante(1);

        $reserva = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
            'codigo_reserva' => strtoupper(uniqid()),
            'cliente_id' => $this->cliente[0]->id,
            'paquete_id' => $this->paquetesTuristicos->id,
            'estado_reservas_id' => $estado //
        ]);


        $boletas = Boletas::create([
            'numero_boleta' => '',
            'monto' => $this->paquetesTuristicos->precio
        ]);

        $boletas->numero_boleta = 'BOL-' . $boletas->id;
        $boletas->save();




        if ($this->archivo_pago) {
            $filename = uniqid() . '_' . time() . rand(1, 1000);

            //$image = $this->archivo_pago->getRealPath();
            $ext = $this->archivo_pago->getClientOriginalExtension();

            $ruta = $this->archivo_pago->storeAs('archivo', $filename . '.' . $ext, 'private');
            //$ruta = Storage::disk('private')->putFileAs('photos', $image, $filename);;
        }

        $pagos = Pagos::create([
            'monto' => $this->monto,
            'fecha_pago' => $this->fecha_de_pago,
            'numero_de_operacion' => $this->numero_operacion,
            'estado_pago' => 'EN PROCESO', //EN VERIFICACIÓN DE ACEPTACIÓN
            'ruta_archivo_pago' => $ruta,
            'reserva_id' => $reserva->id,
            'cuenta_pagos_id' => $this->idCuentaPagos, //TIPO DE PAGO PARA INSERTAR
            'boleta_id' => $boletas->id,
            'serie_pagos' => $serie_pagos->id
        ]);

        redirect()->route('cliente.paquetes');
    }

    public function alert($title, $icon, $text)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }
}
