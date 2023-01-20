<?php

namespace App\Http\Livewire\ReservasPublicas\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
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
    public $precio = 0, $paquete_id = 0, $paquete;
    public $encontrado = false;


    protected $rules = [
        'fecha_reserva' => 'required|date',
        'observacion' => 'nullable|min:5',
        'monto' => 'required',
        'numero_operacion' => 'nullable|min:3|max:25',
        'archivo_pago' => 'required',
        //'tipo_pago' => 'required',
        'fecha_de_pago' => 'required|date',
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
        //$tipo_pagos = DB::select('SELECT * FROM tipo_pagos');
        return view('livewire.reservas-publicas.reservas.formulario-reservas');
    }

    public function reservar()
    {
        $this->validate();

        $precio_minimo = $this->paquetesTuristicos->precio * 0.20;
        if ($this->monto < $precio_minimo) {
            session()->flash('mensaje-falla-pago', 'El pago debe de ser de al menos el 20 %');
            return;
        }

        $estado = 2; //PENDIENTE DE PAGO
        if ($this->monto == $this->paquetesTuristicos->precio) {
            $estado = 1;
        }
        $reserva = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
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

        $pagos = Pagos::create([
            'monto' => $this->monto,
            'fecha_pago' => $this->fecha_de_pago,
            'estado_pago' => 'EN PROCESO', //EN VERIFICACIÓN DE ACEPTACIÓN
            'ruta_archivo_pago' => 'storage/'.$this->archivo_pago->store('archivo_pagos','public'),
            'reserva_id' => $reserva->id,
            'tipo_pagos_id' => 1, //TIPO DE PAGO PARA INSERTAR
            'boleta_id' => $boletas->id
        ]);
        
        redirect()->route('cliente.paquetes');
    }
}
