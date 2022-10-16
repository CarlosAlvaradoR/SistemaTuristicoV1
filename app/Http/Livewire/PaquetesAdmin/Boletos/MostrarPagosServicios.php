<?php

namespace App\Http\Livewire\PaquetesAdmin\Boletos;

use Livewire\Component;
use App\Models\BoletosPagarPaquetes;
use Illuminate\Support\Facades\DB;

class MostrarPagosServicios extends Component
{
    public $idPaquete;
    public $descripcion, $precio;
    
    protected $rules = [
        'descripcion' => 'required',
        'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/'
    ];

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $pagos = DB::select('SELECT id, descripcion, precio, paquete_id FROM boletos_pagar_paquetes
        WHERE paquete_id = 3');
        return view('livewire.paquetes-admin.boletos.mostrar-pagos-servicios', compact('pagos'));
    }

   public function guardarPagosServiciosPaquete(){
    $this->validate();
    $pagos = BoletosPagarPaquetes::create([
            'descripcion' => $this->descripcion, 
            'precio' => $this->precio, 
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['descripcion','precio']);
        session()->flash('message', 'Pago por servicio añadido correctamente');    
   }
}
