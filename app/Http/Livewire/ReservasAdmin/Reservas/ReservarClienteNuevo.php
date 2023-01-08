<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Nacionalidades;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use Livewire\Component;

class ReservarClienteNuevo extends Component
{

    public $dni = '', $nombres = '', $apellidos, $genero = '', $telefono, $direccion, $nacionalidad, $numero_pasaporte, $archivo_pasaporte;
    public $paquete = '', $precio_del_paquete = 0, $fecha_reserva, $observacion, $pago_por_reserva, $archivo_pago;
    public $paquetes_turisticos = '', $monto = 0;


    protected $rules = [
        'dni' => 'required|min:3|unique:personas',
        'nombres' => 'required',
        'apellidos' => 'required',
        'genero' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
        'nacionalidad' => 'required',
        'paquete' => 'required|min:1',
        'fecha_reserva' => 'required',
        'pago_por_reserva' => 'required',
    ];



    public function render()
    {
        $nacionalidades = Nacionalidades::all();
        $paquetes = PaquetesTuristicos::all();
        if ($this->paquete > 0 && $this->paquete != null) {
            $this->paquetes_turisticos = PaquetesTuristicos::findOrFail($this->paquete);
            $this->precio_del_paquete = $this->paquetes_turisticos->precio;
        }else{
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
        $precio_minimo = $this->precio_del_paquete*0.20;
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

        //dd('Guardado correctamente');
        //redirect()->route('paquetes.reservar', [$this->paquete]);
    }
}
