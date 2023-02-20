<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores;

use App\Models\Pedidos\Proveedores as PedidosProveedores;
use Livewire\Component;

class Proveedores extends Component
{
    public $ruc, $nombre_proveedor, $direccion, $telefono, $email, $web;


    public function render()
    {
        $proveedores = PedidosProveedores::all(['id', 'ruc', 'nombre_proveedor', 'direccion', 'telefono', 'email', 'web']);
        return view('livewire.proveedores-admin.proveedores.proveedores', compact('proveedores'));
    }

    public function saveProveedor()
    {
        PedidosProveedores::create(
            [
                'ruc' => $this->ruc,
                'nombre_proveedor' => $this->nombre_proveedor,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'web' => $this->web
            ]
        );
    }

    public function Edit(PedidosProveedores $proveedor){
        $this->ruc = $proveedor->ruc;
        $this->nombre_proveedor = $proveedor->ruc;
        $this->direccion = $proveedor->direccion;
        $this->telefono = $proveedor->telefono;
        $this->email = $proveedor->email;
        $this->web = $proveedor->web;
    }
}
