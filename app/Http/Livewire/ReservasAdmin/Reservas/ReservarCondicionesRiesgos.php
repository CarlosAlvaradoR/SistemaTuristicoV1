<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use App\Models\Paquetes\CondicionPuntualidades;
use App\Models\Paquetes\Riesgos;
use App\Models\Reservas\CondicionesAceptadas;
use App\Models\Reservas\Reservas;
use App\Models\Reservas\RiesgosAceptados;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReservarCondicionesRiesgos extends Component
{
    public $reserva;
    public $cliente, $dni; //Datos del cliente que hizo la reserva
    public $nombre_del_paquete; //Nombre del paquete al que corresponde el registro



    public function mount(Reservas $reserva){
        $this->reserva = $reserva;
        $cliente = DB::select("SELECT p.dni, concat(p.nombre,' ', p.apellidos) as datos FROM personas p
        INNER JOIN clientes c on p.id = c.persona_id
        INNER JOIN reservas r on c.id = r.cliente_id
        WHERE r.id = ".$reserva->id." LIMIT 1");
        $paquete = DB::select("SELECT p.nombre FROM paquetes_turisticos p
        WHERE id = ".$reserva->paquete_id."");

        $this->cliente = $cliente[0]->datos;
        $this->dni = $cliente[0]->dni;
        $this->nombre_del_paquete = $paquete[0]->nombre;
    }

    public function render()
    {
        //$condiciones_puntualidad = CondicionPuntualidades::where('paquete_id','=',$this->reserva->paquete_id)->get();
        //$riesgos = Riesgos::where('paquete_id','=',$this->reserva->paquete_id)->get();
        $riesgos = DB::select("SELECT * FROM riesgos r
        WHERE NOT EXISTS
        (SELECT NULL FROM riesgos_aceptados ra WHERE ra.riesgos_id = r.id AND ra.reserva_id = ".$this->reserva->id.")
        AND r.paquete_id = ".$this->reserva->paquete_id."");

        $condiciones_puntualidad = DB::select("SELECT id, descripcion, paquete_id FROM condicion_puntualidades cp
        WHERE NOT EXISTS
        (SELECT NULL FROM condiciones_aceptadas ca WHERE ca.condicion_puntualidades_id = cp.id AND ca.reserva_id = ".$this->reserva->id.")
        AND cp.paquete_id = ".$this->reserva->paquete_id."");

        return view('livewire.reservas-admin.reservas.reservar-condiciones-riesgos', compact('riesgos','condiciones_puntualidad'));
    }


    public function aceptarRiesgo($idRiesgo){
        RiesgosAceptados::create([
            'estado_aceptacion' => 1, 
            'riesgos_id' => $idRiesgo, 
            'reserva_id' => $this->reserva->id
        ]);
    }

    public function aceptarCondiciones($idCondicion){
        CondicionesAceptadas::create([
            'aceptacion_condicion' => 1, 
            'condicion_puntualidades_id' => $idCondicion, 
            'reserva_id' => $this->reserva->id
        ]);
    }

    public function finalizarReserva(){ //Si los ítems están llenados vuelve a nuevas reservas, sino se queda acá en el formulario
        redirect()->route('paquetes.reservar.crear_cliente');
    }
}
