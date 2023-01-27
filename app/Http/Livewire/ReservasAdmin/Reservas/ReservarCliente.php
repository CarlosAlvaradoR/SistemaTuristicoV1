<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Reservas\AutorizacionesMedicas;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReservarCliente extends Component
{
    use WithFileUploads;



    public $dni = "";
    public $nombres_apellidos = '', $dni_encontrado = '', $telefono_cliente = '', $idCliente = 0;
    public $buscar = '';
    public $archivos = [], $archivos_pago = [];
    public $fecha_reserva, $observacion, $monto = 0; //Para Insertar Reservas
    public $numero_autorizacion, $archivo_autorizacion; //Para insertar aurtorizaciones Médicas
    public $precio = 0, $paquete_id = 0, $paquete;
    public $encontrado = false, $insertar_archivo = false;


    public function mount(PaquetesTuristicos $paquete)
    {
        $this->precio = $paquete->precio;
        $this->paquete_id = $paquete->id;
        $this->paquete = $paquete;
    }


    public function render()
    {

        return view('livewire.reservas-admin.reservas.reservar-cliente');
    }

    public function buscar()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        $sql = "SELECT p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, c.id as idCliente FROM personas p
        INNER JOIN clientes c on p.id = c.persona_id
        WHERE p.dni = '" . $this->dni . "'";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->dni_encontrado = $this->buscar[0]->dni;
            $this->telefono_cliente = $this->buscar[0]->telefono;
            $this->idCliente = $this->buscar[0]->idCliente;
            $this->encontrado = true;

            $this->reset(['dni']);
        } else {
            $this->resetValidation();
            $this->reset(['dni']);
            //dd('No encontrado');
        }
    }

    public function saveReserva()
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

        if (strlen(trim($this->numero_autorizacion)) >=3) {
            if (!$this->archivo_autorizacion) {
                session()->flash('message-archivo', 'El Archivo es Obligatorio siempre y cuando se haya un Nº de Autorización');
                return;
            }else {
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
