<?php

namespace App\Http\Livewire\ProveedoresAdmin;

use App\Models\Pedidos\TipoComprobantes;
use Livewire\Component;

class TiposDeComprobante extends Component
{
    public $title = 'CREAR TIPOS DE COMPROBANTE';
    public $idTipoComprobante, $nombre_tipo;

    public function resetUI(){

    }
    public function render()
    {
        $tipo_comprobantes = TipoComprobantes::all();
        return view('livewire.proveedores-admin.tipos-de-comprobante', compact('tipo_comprobantes'));
    }

    public function saveTipoComprobante(){
        
    }

    /**
     * 
     */
}
