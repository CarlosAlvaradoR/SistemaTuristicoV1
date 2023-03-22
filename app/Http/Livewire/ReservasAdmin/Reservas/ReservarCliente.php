<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Reservas\AutorizacionesPresentadas;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Nacionalidades;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Pasaportes;
use App\Models\Reservas\Reservas;
use DateTime;
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
    public $fecha_reserva, $observacion, $monto = 0, $numero_de_operacion, $estado_de_pago, $observacion_del_pago; //Para Insertar Reservas
    public $archivo_pago, $tipo_de_pago;
    public $numero_autorizacion, $archivo_autorizacion; //Para insertar aurtorizaciones Médicas
    public $precio = 0, $paquete_id = 0, $paquete;
    public $insertar_archivo = false;

    public $nacionalidad, $numero_pasaporte, $archivo_pasaporte;
    public $encontradoComoCliente = false, $encontradoComoPersona = false, $no_existe = false;
    public $message = '';

    public $contador = 0;

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
        $query = "SELECT * FROM autorizaciones_medicas
        WHERE paquete_id = " . $this->paquete_id . "
        limit 1";
        //dd($query);
        $consulta = DB::select($query);

        $tipoPagos = DB::table('tipo_pagos as tp')
            ->join('cuenta_pagos as cp', 'tp.id', '=', 'cp.tipo_pagos_id')
            ->select('tp.nombre_tipo_pago', 'cp.id as idCuentaPago', 'cp.numero_cuenta')
            ->get();

        $this->contador = count($consulta);
        return view('livewire.reservas-admin.reservas.reservar-cliente', compact('nacionalidades', 'tipoPagos'));
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
    { //CUANDO ESTÁ COMO PERSONA ENCONTRADA PERO NO COMO CLIENTE
        //dd('GUARDANDO COMO PERSONA');
        $this->validate(
            [
                'nacionalidad' => 'required',
                'numero_pasaporte' => 'nullable|min:3|max:15',
                'fecha_reserva' => 'required',
                'monto' => 'required',
                'numero_autorizacion' => 'nullable|min:2|max:15',
                'archivo_autorizacion' => 'nullable|mimes:jpeg,png,pdf|required_if:numero_autorizacion,min:2',
            ]
        );

        if ($this->numero_pasaporte) {
            if (!$this->archivo_pasaporte) {
                $this->alert('ALERTA!', 'info', 'Es necesario que suba un archivo de Pasaporte');
                return;
            }
        }


        list($mensaje, $title, $icon, $message) = Reservas::validarFechaMayorReserva($this->fecha_reserva);

        if ($mensaje == 'No permitido') {
            $this->alert($title, $icon, $message);
            return '';
        }


        $precio_minimo = $this->paquete->precio * 0.20;
        //dd($precio_minimo);
        if ($this->monto < $precio_minimo) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ALERTA',
                'icon' => 'warning',
                'text' => 'El pago debe de ser de al menos el 20 %'
            ]);

            return;
        }

        if (strlen(trim($this->numero_autorizacion)) >= 3) {
            if (!$this->archivo_autorizacion) {
                session()->flash('message-archivo', 'El Archivo es Obligatorio siempre y cuando se haya un Nº de Autorización');
                return;
            } else {
                $this->insertar_archivo = true;
            }
        }

        if ($this->contador > 0) {
            if (!$this->numero_autorizacion) {
                $this->alert('INFORMACIÓN','info','La reserva necesita de un Nº de Autorización Médica y un archivo.');
                return;
            }
            if (!$this->archivo_autorizacion) {
                $this->alert('INFORMACIÓN','info','La reserva necesita de un Nº de Autorización Médica y un archivo.');
                return;
            }
        }
        $cliente = Clientes::create([
            'persona_id' => $this->idPersona,
            //'user_id', 
            'nacionalidad_id' => $this->nacionalidad
        ]);

        if ($this->numero_pasaporte && $this->archivo_pasaporte) {
            $pasaportes = Pasaportes::create([
                'numero_pasaporte' => $this->numero_pasaporte,
                'ruta_archivo_pasaporte' => $this->archivo_pasaporte,
                'cliente_id' => $cliente->id
            ]);
        }

        $reserva = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
            'codigo_reserva' => strtoupper(uniqid()),
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

        $numero_de_operacion = '';
        if ($this->numero_de_operacion) {
            $numero_de_operacion = $this->numero_de_operacion;
        }
        $observacion_del_pago = '';
        if ($this->observacion_del_pago) {
            $observacion_del_pago = $this->observacion_del_pago;
        }
        $archivo_pago = '';
        if ($this->archivo_pago) {
            $archivo_pago = $this->archivo_pago;
        }

        $pagos = Pagos::create([
            'monto' => $this->monto,
            'fecha_pago' => now(),
            'numero_de_operacion' => $numero_de_operacion,
            'estado_pago' => $this->estado_de_pago,
            'observacion_del_pago' => $observacion_del_pago,
            'ruta_archivo_pago' => $archivo_pago,
            'reserva_id' => $reserva->id,
            'cuenta_pagos_id' => $this->tipo_de_pago,
            'boleta_id' => $boletas->id
        ]);

        if ($this->contador > 0) {
            $autorizacion = AutorizacionesPresentadas::create([
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


        list($mensaje, $title, $icon, $message) = Reservas::validarFechaMayorReserva($this->fecha_reserva);
        if ($mensaje == 'No permitido') {
            $this->alert($title, $icon, $message);
            return '';
        }

        $cantidad = Reservas::validarSiYaReservoParaUnaFecha($this->idCliente, $this->fecha_reserva);
        if ($cantidad > 0) {
            $this->alert('ALERTA', 'warning','El Cliente ya hizo una reservación para la fecha selecionada');
            return;
        }

        $precio_minimo = $this->paquete->precio * 0.20;
        //dd($precio_minimo);
        if ($this->monto < $precio_minimo) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ALERTA',
                'icon' => 'warning',
                'text' => 'El pago debe de ser de al menos el 20 %'
            ]);

            return;
        }

        if (strlen(trim($this->numero_autorizacion)) >= 3) {
            if (!$this->archivo_autorizacion) {
                session()->flash('message-archivo', 'El Archivo es Obligatorio siempre y cuando se haya un Nº de Autorización');
                return;
            } else {
                $this->insertar_archivo = true;
            }
        }

        if ($this->contador > 0) {
            if (!$this->numero_autorizacion) {
                $this->alert('INFORMACIÓN','info','La reserva necesita de un Nº de Autorización Médica y un archivo.');
                return;
            }
            if (!$this->archivo_autorizacion) {
                $this->alert('INFORMACIÓN','info','La reserva necesita de un Nº de Autorización Médica y un archivo.');
                return;
            }
        }

        $reserva = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
            'codigo_reserva' => strtoupper(uniqid()),
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

        $numero_de_operacion = '';
        if ($this->numero_de_operacion) {
            $numero_de_operacion = $this->numero_de_operacion;
        }
        $observacion_del_pago = '';
        if ($this->observacion_del_pago) {
            $observacion_del_pago = $this->observacion_del_pago;
        }
        $archivo_pago = '';
        if ($this->archivo_pago) {
            $archivo_pago = $this->archivo_pago;
        }
        $pagos = Pagos::create([
            'monto' => $this->monto,
            'fecha_pago' => now(),
            'numero_de_operacion' => $numero_de_operacion,
            'estado_pago' => $this->estado_de_pago,
            'observacion_del_pago' => $observacion_del_pago,
            'ruta_archivo_pago' => $archivo_pago,
            'reserva_id' => $reserva->id,
            'cuenta_pagos_id' => $this->tipo_de_pago,
            'boleta_id' => $boletas->id
        ]);

        if ($this->contador > 0) {
            $autorizacion = AutorizacionesPresentadas::create([
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
    

    public function validarFecha()
    {
        list($mensaje, $title, $icon, $message) = Reservas::validarFechaMayorReserva($this->fecha_reserva);

        if ($mensaje == 'No permitido') {
            $this->alert($title, $icon, $message);
            return '';
        }
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
