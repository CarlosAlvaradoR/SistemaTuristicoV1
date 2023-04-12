<?php

namespace App\Http\Livewire\ViajesAdmin\Participantes;

use App\Models\Equipos;
use App\Models\Inventario\EntregaEquipos;
use Livewire\Component;

class ParticipantesEquipos extends Component
{
    public $paquete, $viaje, $participante;
    /** ATRIBUTOS DE LA TABLA ENTREGA-EQUIPOS*/
    public $idEntregaEquipo, $fecha_entrega, $hora_entrega, $fecha_devoluvion, $hora_devolucion, $estado;

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

        $entrega_equipos = [];
         $entrega_equipos = EntregaEquipos::where('participantes_id', $this->participante->id)->limit(1)->get();
       if (count($entrega_equipos) > 0) {
            $this->idEntregaEquipo = $entrega_equipos[0]->id;
            $this->fecha_entrega = $entrega_equipos[0]->fecha_entrega;
            $this->hora_entrega = $entrega_equipos[0]->hora_entrega;
            $this->fecha_devoluvion = $entrega_equipos[0]->fecha_devoluvion;
            $this->hora_devolucion = $entrega_equipos[0]->hora_devolucion;
            $this->estado = $entrega_equipos[0]->estado;
        }
        return view('livewire.viajes-admin.participantes.participantes-equipos', compact('equipos', 'entrega_equipos'));
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

    
    public function dd(){
        dd('jjj');
    }
}
