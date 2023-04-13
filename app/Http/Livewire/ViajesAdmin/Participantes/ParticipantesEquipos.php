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
    public $paquete, $viaje, $participante;
    /** ATRIBUTOS DE EQUIPO */
    public $idEquipo;
    /** ATRIBUTOS DE LA TABLA ENTREGA-EQUIPOS*/
    public $idEntregaEquipo, $fecha_entrega, $hora_entrega, $fecha_devoluvion, $hora_devolucion, $estado;
    /** ATRIBUTOS DE LA TABLA DETALLE ENTREGAS */
    public $idDetalleEntregas, $cantidad, $observacion;

    public function resetUI()
    {
        $this->reset(['idEquipo', 'idDetalleEntregas', 'cantidad', 'observacion']);
    }

    public function mount($paquete, $viaje, $participante)
    {
        $this->paquete = $paquete;
        $this->viaje = $viaje;
        $this->participante = $participante;
    }

    public function render()
    {
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
        return view('livewire.viajes-admin.participantes.participantes-equipos',
            compact('equipos', 'entrega_equipos', 'equipos_asignados')
        );
    }

    public function saveEntregaEquipos()
    {
        //dd('LLEGÓ');
        $entrega_equipos = EntregaEquipos::create(
            [
                'fecha_entrega' => $this->fecha_entrega,
                'hora_entrega' => $this->hora_entrega,
                'fecha_devoluvion' => $this->fecha_devoluvion,
                'hora_devolucion' => $this->hora_devolucion,
                'estado' => 'COMPLETADO',
                'participantes_id' => $this->participante->id
            ]
        );
    }

    public function AñadirAlPedido(Equipos $equipo)
    {
        $this->idEquipo = $equipo->id;
        $this->title = 'AÑADIR PRÉSTAMO DE: '. strtoupper($equipo->nombre);
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
        if ($this->idDetalleEntregas) {
            # code...
            $detalle_entregas = DetalleEntregas::findOrFail($this->idDetalleEntregas);
            $detalle_entregas->cantidad = $this->cantidad;
            $detalle_entregas->observacion = $this->observacion;
            $detalle_entregas->save();
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
        $this->resetUI();
    }
}
