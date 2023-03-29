<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\Reservas\AutorizacionesPresentadas;
use App\Models\Reservas\Boletas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Nacionalidades;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Pasaportes;
use App\Models\Reservas\Reservas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReservarClienteNuevo extends Component
{
    use WithFileUploads;

    public $reserva;
    public $nombrePaquete, $precio_del_paquete;
    public $idPersona, $idCliente, $idPasaportes, $dni = '', $nombres = '', $apellidos, $genero = '', $telefono, $direccion, $nacionalidad, $numero_pasaporte, $archivo_pasaporte, $ver_pasaporte;
    public $paquete = '', $idReserva, $fecha_reserva, $observacion, $pago_por_reserva, $archivo_pago, $tipo_de_pago;
    public $paquetes_turisticos, $monto = 0, $numero_de_operacion, $estado_de_pago, $observacion_del_pago;
    public $numero_autorizacion, $archivo_autorizacion, $ver_autorizacion;

    public $contador = 0;

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
        'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'numero_autorizacion' => 'nullable|min:2|max:15',
        'archivo_autorizacion' => 'nullable|mimes:jpeg,png,pdf',
    ];

    public function mount($paquete, $reserva)
    {
        if ($reserva) {
            $this->reserva = $reserva;
            $paquete = PaquetesTuristicos::findOrFail($this->reserva->paquete_id);
        }

        if ($paquete) {
            $this->paquete = $paquete->id;
            $this->nombrePaquete = $paquete->nombre;
            $this->precio_del_paquete = $paquete->precio;
        }
    }

    public function render()
    {
        $consulta = [];
        $pagos = [];
        $autorizaciones_presentadas = [];
        $nacionalidades = Nacionalidades::all();
        $paquetes = PaquetesTuristicos::all();
        if ($this->paquete > 0 && $this->paquete != null) {
            $this->paquetes_turisticos = PaquetesTuristicos::findOrFail($this->paquete);
            $this->precio_del_paquete = $this->paquetes_turisticos->precio;
            $query = "SELECT * FROM autorizaciones_medicas
        WHERE paquete_id = " . $this->paquetes_turisticos->id . "
        limit 1";
            //dd($query);
            $consulta = DB::select($query);
        } else {
            $this->precio_del_paquete = 0;
            $consulta = [];
        }

        $this->contador = count($consulta);

        if ($this->reserva) {
            # Sacamos la Información de toda la Reserva

            $cliente = DB::select('SELECT p.id as idPersona, p.dni, p.nombre, p.apellidos, p.genero, p.telefono, p.dirección, n.id as idNacionalidad, c.id as idCliente,
            pa.numero_pasaporte, pa.ruta_archivo_pasaporte, pa.id as idPasaporte,
            r.fecha_reserva, r.observacion, r.id as idReserva
            FROM personas p
            INNER JOIN clientes c on c. persona_id=p.id
            INNER JOIN nacionalidades n on n.id = c.nacionalidad_id
            LEFT JOIN pasaportes pa on pa.cliente_id = c.id
            INNER JOIN reservas r on r.cliente_id = c.id
            WHERE r.id = ' . $this->reserva->id . '');
            $this->idPersona = $cliente[0]->idPersona;
            $this->idCliente = $cliente[0]->idCliente;
            $this->idPasaportes = $cliente[0]->idPasaporte;
            $this->idReserva = $cliente[0]->idReserva;
            $this->dni = $cliente[0]->dni;
            $this->nombres = $cliente[0]->nombre;
            $this->apellidos = $cliente[0]->apellidos;
            $this->genero = $cliente[0]->genero;
            $this->telefono = $cliente[0]->telefono;
            $this->direccion = $cliente[0]->dirección;
            $this->nacionalidad = $cliente[0]->idNacionalidad;
            $this->numero_pasaporte = $cliente[0]->numero_pasaporte;
            $this->ver_pasaporte = $cliente[0]->ruta_archivo_pasaporte;
            $this->fecha_reserva = $cliente[0]->fecha_reserva;
            $this->observacion = $cliente[0]->observacion;

            $pagos = DB::select('SELECT id as idPago, monto, fecha_pago, numero_de_operacion, estado_pago, observacion_del_pago, 
            ruta_archivo_pago, reserva_id, cuenta_pagos_id, boleta_id 
            FROM pagos pa WHERE reserva_id = ' . $this->reserva->id . '');

            if ($this->contador > 0) {
                $autorizaciones_presentadas = DB::select('SELECT id as idAutorizacionMedica, numero_autorizacion, ruta_archivo, reserva_id, autorizaciones_medicas_id FROM autorizaciones_presentadas
                WHERE reserva_id = ' . $this->reserva->id . '
                LIMIT 1');
                $this->numero_autorizacion = $autorizaciones_presentadas[0]->numero_autorizacion;
                $this->ver_autorizacion = $autorizaciones_presentadas[0]->ruta_archivo;
            }
        }



        $tipoPagos = DB::table('tipo_pagos as tp')
            ->join('cuenta_pagos as cp', 'tp.id', '=', 'cp.tipo_pagos_id')
            ->select('tp.nombre_tipo_pago', 'cp.id as idCuentaPago', 'cp.numero_cuenta')
            ->get();

        return view('livewire.reservas-admin.reservas.reservar-cliente-nuevo', compact(
            'nacionalidades',
            'paquetes',
            'tipoPagos',
            'pagos'
        ));
    }




    public function guardarReservaCliente()
    {
        $this->validate();
        if ($this->numero_pasaporte) {
            if (!$this->archivo_pasaporte) {
                $this->alert('ALERTA!', 'info', 'Es necesario que suba un archivo de Pasaporte siempre que digite un Nº de Pasaporte');
                return;
            }
        }

        list($mensaje, $title, $icon, $message) = Reservas::validarFechaMayorReserva($this->fecha_reserva);

        if ($mensaje == 'No permitido') {
            $this->alert($title, $icon, $message);
            return '';
        }

        //Sacamos el 20% del total del precio del paquete
        $precio_minimo = $this->precio_del_paquete * 0.20;
        if ($this->monto < $precio_minimo) {
            $this->alert('ALERTA', 'warning', 'El pago debe de ser de al menos el 20 %');
            return;
        }

        if ($this->contador > 0) {
            if (!$this->numero_autorizacion) {
                $this->alert('INFORMACIÓN', 'info', 'La reserva necesita de un Nº de Autorización Médica y un archivo.');
                return;
            }
            if (!$this->archivo_autorizacion) {
                $this->alert('INFORMACIÓN', 'info', 'La reserva necesita de un Nº de Autorización Médica y un archivo.');
                return;
            }
        }

        //personas

        $personas = Personas::create([
            'dni' => $this->dni,
            'nombre' => strtoupper($this->nombres),
            'apellidos' => strtoupper($this->apellidos),
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

        if ($this->numero_pasaporte && $this->archivo_pasaporte) { //DATOS OPCIONALES EN LA RESERVA
            $pasaportes = Pasaportes::create([
                'numero_pasaporte' => $this->numero_pasaporte,
                'ruta_archivo_pasaporte' => 'storage/' . $this->archivo_pasaporte->store('pasaportes', 'public'),
                'cliente_id' => $clientes->id
            ]);
        }


        //reserva
        $reservas = Reservas::create([
            'fecha_reserva' => $this->fecha_reserva,
            'observacion' => $this->observacion,
            'codigo_reserva' => strtoupper(uniqid()),
            'cliente_id' => $clientes->id,
            'paquete_id' => $this->paquetes_turisticos->id,
            'estado_reservas_id' => 1
        ]);


        $boletas = Boletas::create([
            'numero_boleta' => '',
            'monto' => $this->precio_del_paquete
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
            'ruta_archivo_pago' => $archivo_pago, /////////RUTA DE ARCHIVO DE PAGO
            'reserva_id' => $reservas->id,
            'cuenta_pagos_id' => $this->tipo_de_pago,
            'boleta_id' => $boletas->id
        ]);


        if ($this->contador > 0) {
            $autorizacion = AutorizacionesPresentadas::create([
                'numero_autorizacion' => $this->numero_autorizacion,
                'ruta_archivo' => 'storage/' . $this->archivo_autorizacion->store('autorizaciones', 'public'),
                'reserva_id' => $reservas->id
            ]);
        }

        redirect()->route('paquetes.reservar.condiciones.puntualidad', [$reservas]); //Id de la reserva, o posible slug
    }

    public function UpdateInfoCliente()
    {
        //$this->validate();
        $personas = Personas::findOrFail($this->idPersona);
        $personas->dni = $this->dni;
        $personas->nombre = strtoupper($this->nombres);
        $personas->apellidos = strtoupper($this->apellidos);
        $personas->genero = $this->genero;
        $personas->telefono = $this->telefono;
        $personas->dirección = $this->direccion;
        $personas->save();

        $clientes = Clientes::findOrFail($this->idCliente);
        $clientes->nacionalidad_id = $this->nacionalidad;
        $clientes->save();

        if ($this->numero_pasaporte) {
            if (!$this->archivo_pasaporte) {
                $this->alert('ALERTA!', 'info', 'Es necesario que suba un archivo de Pasaporte siempre que digite un Nº de Pasaporte');
                return;
            } else {
                if ($this->idPasaportes) {
                    //dd('LLEGÓ CON ID PASAPORTES');
                    $archivo_pasaporte = $this->ver_pasaporte;
                    if ($this->archivo_pasaporte) {
                        $eliminar = unlink($this->ver_pasaporte);
                        $archivo_pasaporte = 'storage/' . $this->archivo_pasaporte->store('pasaportes', 'public');
                    }
                    $pasaportes = Pasaportes::findOrFail($this->idPasaportes);
                    $pasaportes->numero_pasaporte = $this->numero_pasaporte;
                    $pasaportes->ruta_archivo_pasaporte = $archivo_pasaporte;
                    $pasaportes->save();
                } else {
                    //dd('LLEGÓ');
                    $pasaportes = Pasaportes::create([
                        'numero_pasaporte' => $this->numero_pasaporte,
                        'ruta_archivo_pasaporte' => 'storage/' . $this->archivo_pasaporte->store('pasaportes', 'public'),
                        'cliente_id' => $clientes->id
                    ]);
                }
            }
        }

        $this->alert('MUY BIEN', 'success', 'Se Actualizó Satisfactoriamente la Información del Cliente');
    }

    public function UpdateInfoReserva()
    {
        $reserva = Reservas::findOrFail($this->idReserva);
        $reserva->fecha_reserva = $this->fecha_reserva;
        $reserva->observacion = $this->observacion;
        $reserva->save();
        $this->alert('MUY BIEN', 'success','Se Actualizó Satisfactoriamente la Información de la Reserva');
    }

    function validarFecha()
    {
        list($mensaje, $title, $icon, $message) = Reservas::validarFechaMayorReserva($this->fecha_reserva);

        if ($mensaje == 'No permitido') {
            $this->alert($title, $icon, $message);
            return '';
        }
    }
    function alert($title, $icon, $text)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }

    public function detalle()
    {
        dd($this->numero_autorizacion);
    }
}
