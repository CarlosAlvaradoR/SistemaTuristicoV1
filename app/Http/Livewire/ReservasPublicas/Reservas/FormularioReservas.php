<?php

namespace App\Http\Livewire\ReservasPublicas\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormularioReservas extends Component
{
    public $paquetesTuristicos; //ALL DATES THIS PACKAGES
    public $dni = "";
    public $nombres_apellidos = '', $dni_encontrado = '', $telefono_cliente = '', $idCliente = 0;
    public $buscar = '';
    public $archivos = [], $archivos_pago = [];
    public $cliente; //Datos del Cliente
    public $fecha_reserva, $observacion, $monto = 0; //Para Insertar Reservas
    public $numero_operacion, $archivo_pago, $tipo_pago; //Para insertar en Pagos
    public $precio = 0, $paquete_id = 0, $paquete;
    public $encontrado = false;




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
        return view('livewire.reservas-publicas.reservas.formulario-reservas');
    }

    public function reservar()
    {
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
            'fecha_pago' => now(),
            'estado_pago' => 'EN PROCESO', //EN VERIFICACIÓN DE ACEPTACIÓN
            'ruta_archivo_pago' => '',
            'reserva_id' => $reserva->id,
            'tipo_pagos_id' => 1,
            'boleta_id' => $boletas->id
        ]);
        
        //redirect()->route('paquetes.reservar', [$this->paquete]);
    }
}
