<?php

namespace App\Http\Livewire\ViajesAdmin\Participantes;

use App\Models\Equipos;
use App\Models\Inventario\DetalleEntregas;
use App\Models\Inventario\EntregaEquipos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class ParticipantesEquipos extends Component
{
    public $title = '';
    public $paquete, $viaje, $participante, $informacion_participantes = '';
    /** ATRIBUTOS DE EQUIPO */
    public $idEquipo;
    /** ATRIBUTOS DE LA TABLA ENTREGA-EQUIPOS*/
    public $idEntregaEquipo, $fecha_entrega, $hora_entrega, $fecha_devoluvion, $hora_devolucion, $estado;
    /** ATRIBUTOS DE LA TABLA DETALLE ENTREGAS */
    public $idDetalleEntregas, $cantidad, $observacion;

    protected $rules = [
        'fecha_entrega' => 'required|date',
        'hora_entrega' => ['required', 'regex:/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]?$/'],
        'fecha_devoluvion' => 'nullable|date',
        'hora_devolucion' => ['nullable', 'regex:/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]?$/'],
    ];

    public function resetUI()
    {
        $this->reset(['idEquipo', 'idDetalleEntregas', 'cantidad', 'observacion']);
    }

    public function mount($paquete, $viaje, $participante)
    {
        // dd($participante);
        $this->paquete = $paquete;
        $this->viaje = $viaje;
        $this->participante = $participante;



        // $this->informacion_participantes = ('SELECT p.nombre, p.apellidos, par.id FROM personas p
        // INNER JOIN clientes c on p.id = c.persona_id
        // INNER JOIN reservas r on r.cliente_id = c.id
        // INNER JOIN participantes par on par.reserva_id = r.id
        // WHERE par.id = ' . $this->participante->id . ' LIMIT 1');
    }

    public function render()
    {
        $this->informacion_participantes = DB::table('personas as p')
            ->join('clientes as c', 'p.id', '=', 'c.persona_id')
            ->join('reservas as r', 'r.cliente_id', '=', 'c.id')
            ->join('participantes as par', 'par.reserva_id', '=', 'r.id')
            ->select('p.nombre', 'p.apellidos', 'par.id')
            ->where('par.id', $this->participante->id)
            ->limit(1)
            ->get();

        $equipos = Equipos::all();
        /** VERIFICAMOS QUE HAYA INFORMACIÓN EN EL CAMPO ENTREGA-EQUIPOS CON EL IDENTIFICADOR
         *  DEL ID DEL PARTICIPANTE
         */
        $equipos_asignados = [];
        $entrega_equipos = EntregaEquipos::where('participantes_id', $this->participante->id)->limit(1)->get();

        if (count($entrega_equipos) > 0) {
            $this->idEntregaEquipo = $entrega_equipos[0]->id;
            $this->fecha_entrega = $entrega_equipos[0]->fecha_entrega;
            $this->hora_entrega = $entrega_equipos[0]->hora_entrega;
            $this->fecha_devoluvion = $entrega_equipos[0]->fecha_devoluvion;
            $this->hora_devolucion = $entrega_equipos[0]->hora_devolucion;
            $this->estado = $entrega_equipos[0]->estado;

            $equipos_asignados = DB::select('SELECT e.nombre, m.nombre as marca, de.cantidad, de.observacion, de.id FROM entrega_equipos ee
            INNER JOIN detalle_entregas de on de.entrega_equipos_id = ee.id
            INNER JOIN equipos e on e.id = de.equipo_id
            INNER JOIN marcas m on m.id = e.marca_id
            WHERE de.entrega_equipos_id = ' . $this->idEntregaEquipo . '');
        }
        return view(
            'livewire.viajes-admin.participantes.participantes-equipos',
            compact(
                'equipos',
                'entrega_equipos',
                'equipos_asignados'
            )
        );
    }

    public function saveEntregaEquipos()
    {
        // dd($this->fecha_devoluvion);
        $fecha_devoluccion = null;
        $hora_devolucion = null;
        if ($this->hora_entrega) {
            $this->hora_entrega = substr('' . $this->hora_entrega, 0, 5);
        }
        if ($this->hora_devolucion) {
            $this->hora_devolucion = substr('' . $this->hora_devolucion, 0, 5);
        }

        if ($this->fecha_devoluvion == '0000-00-00' || !$this->fecha_devoluvion) {
            $this->fecha_devoluvion = null;
        }

        $this->validate();

        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Información Registrada Correctamente.';
        if ($this->fecha_devoluvion) {
            $fecha_devoluccion = $this->fecha_devoluvion;
        }
        if ($this->hora_devolucion) {
            $hora_devolucion = substr('' . $this->hora_devolucion, 0, 5);
        }

        if ($this->idEntregaEquipo) {
            $entrega_equipos = EntregaEquipos::findOrFail($this->idEntregaEquipo);
            $entrega_equipos->fecha_entrega = $this->fecha_entrega;
            $entrega_equipos->hora_entrega = $this->hora_entrega;
            $entrega_equipos->fecha_devoluvion = $fecha_devoluccion;
            $entrega_equipos->hora_devolucion = $hora_devolucion;
            $entrega_equipos->estado = $this->estado;
            $entrega_equipos->save();
            $text = 'Información Actualizada Correctamente.';
        } else {
            $entrega_equipos = EntregaEquipos::create(
                [
                    'fecha_entrega' => $this->fecha_entrega,
                    'hora_entrega' => $this->hora_entrega,
                    'fecha_devoluvion' => $fecha_devoluccion,
                    'hora_devolucion' => $hora_devolucion,
                    'estado' => 'COMPLETADO',
                    'participantes_id' => $this->participante->id
                ]
            );
        }

        $this->emit('alert', $title, $icon, $text);
    }

    public function AñadirAlPedido(Equipos $equipo)
    {
        $this->idEquipo = $equipo->id;
        $verifica_equipo_entrega = DetalleEntregas::where('equipo_id', $equipo->id)
            ->where('entrega_equipos_id', $this->idEntregaEquipo)
            ->get();
        if (count($verifica_equipo_entrega) > 0) {
            $this->emit(
                'alert',
                'ALERTA !',
                'warning',
                'Ya se hizo entrega del Equipo ' . strtoupper($equipo->nombre) . ' al Participante.'
            );
            //$this->emit('close-modal');
            $this->resetUI();
            return;
        }
        $this->title = 'AÑADIR PRÉSTAMO DE: ' . strtoupper($equipo->nombre);
        //$this->title = strval(random_int(100000, 999999));
        $this->emit('show-modal', 'abrir editar');
    }

    public function saveDetalleEntregas()
    {
        $this->validate(
            [
                'cantidad' => 'required|numeric|min:1',
                'observacion' => 'nullable|string|min:5',
            ]
        );
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Entrega de Equipo Registrada Correctamente.';
        if ($this->idDetalleEntregas) {

            $detalle_entregas = DetalleEntregas::findOrFail($this->idDetalleEntregas);

            $equipo = Equipos::findOrFail($detalle_entregas->equipo_id);

            $cantidad = $detalle_entregas->cantidad;
            $detalle_entregas->cantidad = $this->cantidad;
            $detalle_entregas->observacion = $this->observacion;
            //MAYOR
            # 5 -> 7 = (2) | Si viene 7 y había 5, sólo se le aumenta 2 y se quita 2 al Stock
            if ($this->cantidad > $cantidad) {
                $cantidad = $this->cantidad - $cantidad; //
                $diferencia = Equipos::diferenciaStock($equipo->stock, $cantidad);
                if ($diferencia < 0) { //Sobrepasa a lo que hay en el Stock
                    $this->emit(
                        'alert',
                        'ALERTA !',
                        'warning',
                        'No se puede prestar la Cantidad de ' . $this->cantidad . ' porque excede a lo que hay en Stock Actualmente.'
                    );
                    return;
                }

                $equipo->stock = $equipo->stock - $cantidad;
                $equipo->save();
            }

            //MENOR
            # 5 -> 2 = 3 // Si viene 2, se le aumenta 3 al stock y se actualiza el detalle
            if ($this->cantidad < $cantidad) {
                $cantidad = $cantidad - $this->cantidad;
                $equipo->stock = $equipo->stock + $cantidad;
                $equipo->save();
            }

            $detalle_entregas->save();
            $text = 'Entrega de Equipo Actualizada Correctamente.';
        } else {
            $equipo = Equipos::findOrFail($this->idEquipo);

            if (($equipo->stock - $this->cantidad) < 0) {
                # No se puede reservae porque la Cantidad a Prestar supera a la que se tiene actualmente en 
                # Stock
                dd('Stock menor a Cantidad');
                return;
            }

            $detalle_entregas = DetalleEntregas::create(
                [
                    'cantidad' => $this->cantidad,
                    'observacion' => $this->observacion,
                    'equipo_id' => $this->idEquipo,
                    'entrega_equipos_id' => $this->idEntregaEquipo
                ]
            );

            $equipo->stock = ($equipo->stock - $this->cantidad);
            $equipo->save();
            //Quitamos la Cantidad al Stock

        }

        $this->emit('alert', $title, $icon, $text);
        $this->emit('close-modal');
        $this->resetUI();
    }
    public function Edit(DetalleEntregas $detalle_entregas)
    {
        // dd($detalle_entregas);
        $this->title = 'EDITAR INFORMACIÓN DE ENTREGA DE EQUIPO';
        $this->idDetalleEntregas = $detalle_entregas->id;
        $this->cantidad = $detalle_entregas->cantidad;
        $this->observacion = $detalle_entregas->observacion;
        $this->emit('show-modal');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-DetalleEquipo', [
            'title' => 'Estás seguro que desea eliminar el Préstamo del Equipo ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    protected $listeners = ['quitarEquipoAlParticipante'];
    public function quitarEquipoAlParticipante(DetalleEntregas $detalle_entregas)
    {
        // dd($detalle_entregas);
        $equipo = Equipos::findOrFail($detalle_entregas->equipo_id);
        $detalle_entregas->delete();

        $equipo->stock = $equipo->stock + $detalle_entregas->cantidad;
        $equipo->save();

        $this->emit('alert', 'MUY BIEN', 'success', 'Préstamo del Equipo Eliminado Correctamente.');
    }
}
