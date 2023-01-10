<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\Reservas\AutorizacionesMedicas;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Nacionalidades;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Pasaportes;
use App\Models\Reservas\Reservas;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReservarClienteNuevo extends Component
{
    use WithFileUploads;


    public $dni = '', $nombres = '', $apellidos, $genero = '', $telefono, $direccion, $nacionalidad, $numero_pasaporte, $archivo_pasaporte;
    public $paquete = '', $precio_del_paquete = 0, $fecha_reserva, $observacion, $pago_por_reserva, $archivo_pago;
    public $paquetes_turisticos = '', $monto = 0;
    public $numero_autorizacion, $archivo_autorizacion;


    protected $rules = [
        'dni' => 'required|min:3|unique:personas',
        'nombres' => 'required',
        'apellidos' => 'required',
        'genero' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
        'nacionalidad' => 'required',
        'numero_pasaporte' => 'nullable|min:3|max:15',
        //'archivo_pasaporte' => 'nullable|',
        'paquete' => 'required|min:1',
        'fecha_reserva' => 'required',
        'pago_por_reserva' => 'required',
        'numero_autorizacion' => 'nullable|min:2|max:15',
        'archivo_autorizacion' => 'nullable|mimes:jpeg,png,pdf',
    ];


    public function render()
    {
        $nacionalidades = Nacionalidades::all();
        $paquetes = PaquetesTuristicos::all();
        if ($this->paquete > 0 && $this->paquete != null) {
            $this->paquetes_turisticos = PaquetesTuristicos::findOrFail($this->paquete);
            $this->precio_del_paquete = $this->paquetes_turisticos->precio;
        } else {
            $this->precio_del_paquete = 0;
        }

        return view('livewire.reservas-admin.reservas.reservar-cliente-nuevo', compact(
            'nacionalidades',
            'paquetes'
        ));
    }




    public function guardarReservaCliente()
    {
        $this->validate();

        //Sacamos el 20% del total del precio del paquete
        $precio_minimo = $this->precio_del_paquete * 0.20;
        if ($this->pago_por_reserva < $precio_minimo) {
            session()->flash('mensaje-falla-pago', 'El pago debe de ser de al menos el 20 %');

            return;
        }

        //personas

        $personas = Personas::create([
            'dni' => $this->dni,
            'nombre' => $this->nombres,
            'apellidos' => $this->apellidos,
            'genero' => $this->genero,
            'telefono' => $this->telefono,
            'dirección' => $this->direccion
        ]);
        //clientes
        $clientes = Clientes::create([
            'persona_id' => $personas->id,
            //'user_id', 
            'nacionalidad_id' => $this->nacionalidad
        ]);
        //pasaportes ?<>

        if ($this->archivo_pasaporte) {
            $pasaporte = Pasaportes::create([
                'numero_pasaporte' => $this->numero_pasaporte,
                'ruta_archivo_pasaporte' => 'storage/' . $this->archivo_pasaporte->store('pasaportes', 'public'),
                'cliente_id' => $clientes->id
            ]);
        }
        //reserva
        $reservas = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
            'cliente_id' => $clientes->id,
            'paquete_id' => $this->paquete,
            'estado_reservas_id' => 1
        ]);


        $boletas = Boletas::create([
            'numero_boleta' => '',
            'monto' => $this->precio_del_paquete
        ]);

        $boletas->numero_boleta = 'BOL-' . $boletas->id;
        $boletas->save();

        $pagos = Pagos::create([
            'monto' => $this->pago_por_reserva,
            'fecha_pago' => now(),
            'ruta_archivo_pago' => '',
            'reserva_id' => $reservas->id,
            'tipo_pagos_id' => 1,
            'boleta_id' => $boletas->id
        ]);

        //Archivo de Autorización de Viajes
        if ($this->archivo_autorizacion) {
            $autorizacion = AutorizacionesMedicas::create([
                'numero_autorizacion' => $this->numero_autorizacion,
                'ruta_archivo' => 'storage/' . $this->archivo_autorizacion->store('autorizaciones', 'public'),
                'reserva_id' => $reservas->id
            ]);
        }

        redirect()->route('paquetes.reservar.condiciones.puntualidad', [$reservas, $this->paquetes_turisticos]); //Id de la reserva, o posible slug
    }

    public function detalle()
    {
        dd($this->numero_autorizacion);
    }
}
