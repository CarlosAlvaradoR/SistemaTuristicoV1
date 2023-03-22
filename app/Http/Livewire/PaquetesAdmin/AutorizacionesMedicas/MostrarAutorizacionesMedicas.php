<?php

namespace App\Http\Livewire\PaquetesAdmin\AutorizacionesMedicas;

use App\Models\Paquetes\AutorizacionesMedicas;
use Livewire\Component;

class MostrarAutorizacionesMedicas extends Component
{
    public $title = 'CREAR AUTORIZACIONES/EXPEDIENTES PARA LA RESERVA';
    public $idPaquete;
    public $detalle_de_archivos, $idAutorizacionesMedicas;

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {

        return view('livewire.paquetes-admin.autorizaciones-medicas.mostrar-autorizaciones-medicas');
    }

    public function saveAutorizacionesMedicas(){
        $autorizacion = AutorizacionesMedicas::create(
            [
                'detalle_de_archivos' => $this->detalle_de_archivos, 
                'paquete_id' => $this->idPaquete
            ]
        );
    }

    public function cerrarModal(){
        
    }

}
