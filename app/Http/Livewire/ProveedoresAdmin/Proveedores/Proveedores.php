<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores;

use App\Models\Pedidos\Proveedores as PedidosProveedores;
use Livewire\Component;

class Proveedores extends Component
{
    public $ruc, $nombre_proveedor, $direccion, $telefono, $email, $web;
    public $title='CREAR PROVEEDORES',$idProveedor, $edicion;


    public function render()
    {
        $proveedores = PedidosProveedores::all(['id', 'ruc', 'nombre_proveedor','slug', 'direccion', 'telefono', 'email', 'web']);
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
        $this->idProveedor = $proveedor->id;
        $this->ruc = $proveedor->ruc;
        $this->nombre_proveedor = $proveedor->nombre_proveedor;
        $this->direccion = $proveedor->direccion;
        $this->telefono = $proveedor->telefono;
        $this->email = $proveedor->email;
        $this->web = $proveedor->web;

        $this->title = 'EDITAR PROVEEDOR';
        $this->edicion = true;
        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function Update(){
        $proveedor = PedidosProveedores::findOrFail($this->idProveedor);
        $proveedor->ruc = $this->ruc;
        $proveedor->nombre_proveedor = $this->nombre_proveedor;
        $proveedor->direccion = $this->direccion;
        $proveedor->telefono = $this->telefono;
        $proveedor->email = $this->email;
        $proveedor->web = $this->web;
        $proveedor->save();

        $this->emit('close-modal', 'Edicion de Mapas');
    }


}
