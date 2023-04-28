<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores;

use App\Models\Pedidos\Proveedores as PedidosProveedores;
use Livewire\Component;

class Proveedores extends Component
{
    public $ruc, $nombre_proveedor, $direccion, $telefono, $email, $web;
    public $title = 'CREAR PROVEEDORES', $idProveedor;

    public function resetUI()
    {
        $this->reset([
            'ruc', 'nombre_proveedor', 'direccion', 'telefono', 'email', 'web',
            'title', 'idProveedor'
        ]);
    }

    public function render()
    {
        // $proveedores = PedidosProveedores::all(['id', 'ruc', 'nombre_proveedor', 'slug', 'direccion', 'telefono', 'email', 'web']);
        $proveedores = PedidosProveedores::all();
        return view('livewire.proveedores-admin.proveedores.proveedores', compact('proveedores'));
    }

    public function saveProveedor()
    {
        $this->validate([
            'ruc' => 'required|string|min:11',
            'nombre_proveedor' => 'required|string|min:3|max:45',
            'direccion' => 'required|string|min:3|max:65',
            'telefono' => 'required|string|min:3|max:20',
            'email' => 'required|string|email',
            'web' => 'required|string|min:3',
        ]);

        if ($this->idProveedor) {
            $proveedor = PedidosProveedores::findOrFail($this->idProveedor);
            $proveedor->ruc = $this->ruc;
            $proveedor->nombre_proveedor = $this->nombre_proveedor;
            $proveedor->direccion = $this->direccion;
            $proveedor->telefono = $this->telefono;
            $proveedor->email = $this->email;
            $proveedor->web = $this->web;
            $proveedor->save();
            $this->emit('close-modal');
        } else {
            $proveedor =  PedidosProveedores::create(
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
        $this->resetUI();
    }

    public function Edit(PedidosProveedores $proveedor)
    {
        //1.75 
        $this->idProveedor = $proveedor->id;
        $this->ruc = $proveedor->ruc;
        $this->nombre_proveedor = $proveedor->nombre_proveedor;
        $this->direccion = $proveedor->direccion;
        $this->telefono = $proveedor->telefono;
        $this->email = $proveedor->email;
        $this->web = $proveedor->web;

        $this->title = 'EDITAR PROVEEDOR';
        $this->emit('show-modal', 'Edicion de Mapas');
    }
}
