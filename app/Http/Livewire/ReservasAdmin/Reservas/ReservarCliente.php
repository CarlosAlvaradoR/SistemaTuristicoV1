<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Reservas\AutorizacionesMedicas;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Nacionalidades;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Pasaportes;
use App\Models\Reservas\Reservas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReservarCliente extends Component
{
    use WithFileUploads;



    public $dni = "";
    public $nombres_apellidos = '', $dni_encontrado = '', $telefono_cliente = '', $idCliente = 0, $idPersona = 0;
    public $buscar = '';
    public $archivos = [], $archivos_pago = [];
    public $fecha_reserva, $observacion, $monto = 0; //Para Insertar Reservas
    public $numero_autorizacion, $archivo_autorizacion; //Para insertar aurtorizaciones Médicas
    public $precio = 0, $paquete_id = 0, $paquete;
    public $insertar_archivo = false;

    public $encontradoComoCliente = false, $encontradoComoPersona = false, $no_existe = false;
    public $message = '';

    function resertUI()
    {
        $this->reset([
            'nombres_apellidos', 'dni_encontrado', 'telefono_cliente', 'idCliente', 'idPersona',
            'buscar', 'archivos', 'archivos_pago', 'fecha_reserva', 'observacion', 'monto', 'numero_autorizacion',
            'archivo_autorizacion', 'insertar_archivo', 'encontradoComoCliente', 'encontradoComoPersona',
            'no_existe', 'message'
        ]);
    }
    public function mount(PaquetesTuristicos $paquete)
    {
        $this->precio = $paquete->precio;
        $this->paquete_id = $paquete->id;
        $this->paquete = $paquete;
    }


    public function render()
    {
        $nacionalidades = Nacionalidades::all();
        return view('livewire.reservas-admin.reservas.reservar-cliente', compact('nacionalidades'));
    }

    public function buscar()
    {
        $this->resertUI();
        $this->validate(
            ['dni' => 'required|min:3']
        );

        //dd($this->dni);
        $this->buscar = DB::table('v_reserva_lista_clientes_registrados')
            ->where('dni', $this->dni)
            ->limit(1)
            ->get();
        //dd($this->buscar);

        if (count($this->buscar) > 0) {
            //dd($this->buscar); return;

            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->idPersona = $this->buscar[0]->id;
            $this->dni_encontrado = $this->buscar[0]->dni;
            $this->telefono_cliente = $this->buscar[0]->telefono;

            $this->encontradoComoPersona = true;

            if ($this->buscar[0]->idCliente) {
                $this->idCliente = $this->buscar[0]->idCliente;
                $this->encontradoComoCliente = true;
            }

            $this->reset(['dni']);
        } else {
            //session()->flash('message-error', 'No se encontró informacion correspondiente al DNI: ' . $this->dni);
            $this->no_existe = true;
            $this->message = 'Cliente con DNI: ' . $this->dni . ' no encontrado';
            //$this->dni_persona = $this->dni;
            $this->resetValidation();
            $this->reset(['dni']);
        }
    }

    public function saveReservaP()
    { //CUANDO ESTÁ COMO PERSONA
        dd('GUARDANDO COMO PERSONA');
        $this->validate(
            [
                'fecha_reserva' => 'required',
                'monto' => 'required',
                'numero_autorizacion' => 'nullable|min:2|max:15',
                'archivo_autorizacion' => 'nullable|mimes:jpeg,png,pdf|required_if:numero_autorizacion,min:2',
            ]
        );

        if (strlen(trim($this->numero_autorizacion)) >= 3) {
            if (!$this->archivo_autorizacion) {
                session()->flash('message-archivo', 'El Archivo es Obligatorio siempre y cuando se haya un Nº de Autorización');
                return;
            } else {
                $this->insertar_archivo = true;
            }
        }
        $cliente = Clientes::create([
            'persona_id' => $this->idPersona,
            //'user_id', 
            'nacionalidad_id' => 1
        ]);
        $pasaportes = Pasaportes::create([
            'numero_pasaporte' => 'AAAA',
            'ruta_archivo_pasaporte' => 'ff0s',
            'cliente_id' => $cliente->id
        ]);
        $reserva = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
            'cliente_id' => $cliente->id,
            'paquete_id' => $this->paquete_id,
            'estado_reservas_id' => 1
        ]);

        $boletas = Boletas::create([
            'numero_boleta' => '',
            'monto' => $this->precio
        ]);

        $boletas->numero_boleta = 'BOL-' . $boletas->id;
        $boletas->save();

        $pagos = Pagos::create([
            'monto' => $this->monto,
            'fecha_pago' => now(),
            'ruta_archivo_pago' => '',
            'reserva_id' => $reserva->id,
            'tipo_pagos_id' => 1,
            'boleta_id' => $boletas->id
        ]);

        //Archivo de Autorización de Viajes
        if ($this->insertar_archivo) {
            $autorizacion = AutorizacionesMedicas::create([
                'numero_autorizacion' => $this->numero_autorizacion,
                'ruta_archivo' => 'storage/' . $this->archivo_autorizacion->store('autorizaciones', 'public'),
                'reserva_id' => $reserva->id
            ]);
        }
        redirect()->route('paquetes.reservar.condiciones.puntualidad', [$reserva]);
    }

    public function saveReserva() //CUANDO ESTÁ COMO CLIENTE
    {
        //dd($this->archivos_pago);
        $this->validate(
            [
                'fecha_reserva' => 'required',
                'monto' => 'required',
                'numero_autorizacion' => 'nullable|min:2|max:15',
                'archivo_autorizacion' => 'nullable|mimes:jpeg,png,pdf|required_if:numero_autorizacion,min:2',
            ]
        );

        if (strlen(trim($this->numero_autorizacion)) >= 3) {
            if (!$this->archivo_autorizacion) {
                session()->flash('message-archivo', 'El Archivo es Obligatorio siempre y cuando se haya un Nº de Autorización');
                return;
            } else {
                $this->insertar_archivo = true;
            }
        }

        $reserva = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
            'cliente_id' => $this->idCliente,
            'paquete_id' => $this->paquete_id,
            'estado_reservas_id' => 1
        ]);

        $boletas = Boletas::create([
            'numero_boleta' => '',
            'monto' => $this->precio
        ]);

        $boletas->numero_boleta = 'BOL-' . $boletas->id;
        $boletas->save();

        $pagos = Pagos::create([
            'monto' => $this->monto,
            'fecha_pago' => now(),
            'ruta_archivo_pago' => '',
            'reserva_id' => $reserva->id,
            'tipo_pagos_id' => 1,
            'boleta_id' => $boletas->id
        ]);

        //Archivo de Autorización de Viajes
        if ($this->insertar_archivo) {
            $autorizacion = AutorizacionesMedicas::create([
                'numero_autorizacion' => $this->numero_autorizacion,
                'ruta_archivo' => 'storage/' . $this->archivo_autorizacion->store('autorizaciones', 'public'),
                'reserva_id' => $reserva->id
            ]);
        }
        redirect()->route('paquetes.reservar.condiciones.puntualidad', [$reserva]);
    }

    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }
}
