<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores;

use App\Models\Pedidos\Pedidos;
use App\Models\Pedidos\Proveedores as PedidosProveedores;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Livewire\Component;

class Proveedores extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '', $cant = 20;
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
        $proveedores = PedidosProveedores::where('nombre_proveedor', 'like', '%' . $this->search . '%')
            ->paginate($this->cant);
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

        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Proveedor Registrado con Éxito.';
        if ($this->idProveedor) {
            $this->authorize('editar-proveedores');

            $proveedor = PedidosProveedores::findOrFail($this->idProveedor);
            $proveedor->ruc = $this->ruc;
            $proveedor->nombre_proveedor = $this->nombre_proveedor;
            $proveedor->direccion = $this->direccion;
            $proveedor->telefono = $this->telefono;
            $proveedor->email = $this->email;
            $proveedor->web = $this->web;
            $proveedor->save();
            $text = 'Proveedor Actualizado con Éxito.';
            $this->emit('close-modal');
        } else {
            $this->authorize('crear-proveedores');
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

        $this->emit('alert', $title, $icon, $text);
        $this->resetUI();
    }

    public function Edit(PedidosProveedores $proveedor)
    {
        $this->authorize('editar-proveedores');
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

    public function deleteConfirm(PedidosProveedores $proveedor)
    {
        $this->authorize('eliminar-proveedores');
        $id = $proveedor->slug;
        $this->dispatchBrowserEvent('swal-confirm-proveedores', [
            'title' => 'Está seguro que desea eliminar al Proveedor ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    protected $listeners = ['deleteProveedor'];
    public function deleteProveedor(PedidosProveedores $proveedores)
    {
        $this->authorize('eliminar-proveedores');

        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Proveedor Eliminado Correctamente.';

        $pedidos = Pedidos::where('proveedores_id', $proveedores->id)->get();

        if (count($pedidos) > 0) {
            $title = 'ERROR !';
            $icon = 'error';
            $text = 'No se puede Eliminar al Proveedor, porque ya se le realizaron pedidos.';
            $this->emit('alert', $title, $icon, $text);
        } else {
            $proveedores->delete();
            $this->emit('alert', $title, $icon, $text);
        }
    }
}
