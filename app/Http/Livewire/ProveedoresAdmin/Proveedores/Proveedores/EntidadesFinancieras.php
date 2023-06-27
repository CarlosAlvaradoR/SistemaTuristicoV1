<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;

use App\Models\Pedidos\Bancos;
use App\Models\Pedidos\CuentaProveedorBancos;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EntidadesFinancieras extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';


    public $cant = 20, $search;
    public $title = 'CREAR ENTIDADES FINANCIERAS';
    public $idBanco, $nombre_banco, $direccion;

    public function resetUI()
    {
        $this->reset(['title', 'idBanco', 'nombre_banco', 'direccion']);
        $this->resetValidation();
    }

    public function render()
    { //
        $bancos = Bancos::where('nombre_banco', 'like', '%' . $this->search . '%')
            ->paginate($this->cant);
        return view('livewire.proveedores-admin.proveedores.proveedores.entidades-financieras', compact('bancos'));
    }

    public function saveEntidad()
    {
        $title = 'MUY BIEN';
        $icon = 'success';
        $text = 'Entidad Finaniera Registrada Corretamente.';
        $this->validate(
            [
                'nombre_banco' => 'required|string|min:3|max:45',
                'direccion' => 'required|string|min:3',
            ]
        );
        if ($this->idBanco) {
            $this->authorize('editar-entidades-financieras');

            $bancos = Bancos::findOrFail($this->idBanco);
            $bancos->nombre_banco = $this->nombre_banco;
            $bancos->direccion = $this->direccion;
            $bancos->save();
            $text = 'Entidad Finaniera Actualizada Corretamente.';

            $this->emit('close-modal');
        } else {
            $this->authorize('crear-entidades-financieras');

            $bancos = Bancos::create(
                [
                    'nombre_banco' => $this->nombre_banco,
                    'direccion' => $this->direccion,
                ]
            );
        }
        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
    }

    public function Edit(Bancos $bancos)
    {
        $this->authorize('editar-entidades-financieras');
        $this->title = 'EDITAR INFORMACIÓN DE LA ENTIDAD BANCARIA';
        $this->idBanco = $bancos->id;
        $this->nombre_banco = $bancos->nombre_banco;
        $this->direccion = $bancos->direccion;
        $this->emit('show-modal');
    }

    public function deleteConfirm($id)
    {
        $this->authorize('eliminar-entidades-financieras');

        $this->dispatchBrowserEvent('swal-confirm-entidadFinanciera', [
            'title' => 'Está seguro que desea eliminar la Entidad Financiera ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    protected $listeners = ['deleteEntidadFinanciera'];
    public function deleteEntidadFinanciera(Bancos $bancos)
    {
        $this->authorize('eliminar-entidades-financieras');

        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Entidad Financiera Eliminada Correctamente.';

        $cuenta_proveedor_bancos = CuentaProveedorBancos::where('bancos_id', $bancos->id)->get();

        if (count($cuenta_proveedor_bancos) > 0) {
            $title = 'ERROR !';
            $icon = 'error';
            $text = 'No se puede Eliminar la Entidad Financiera porque la misma se registró en la Cuenta de un Proveedor.';
            $this->emit('alert', $title, $icon, $text);
        } else {
            $bancos->delete();
            $this->emit('alert', $title, $icon, $text);
        }
    }
}
