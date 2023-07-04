<?php

namespace App\Http\Livewire\UsuariosAdmin\Usuarios;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class MostrarRoles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public $title = 'CREAR ROLES', $search = '', $cant = 10;
    public $idRol, $nombreDeRol;
    public $selectedPermissions = [];


    public function resetUI()
    {
        $this->reset(['title', 'nombreDeRol', 'selectedPermissions', 'idRol']);
    }

    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->where('name', '!=', 'cliente')
            ->paginate($this->cant);
        // dd($roles);
        //$permisos = Permission::all();
        $permisos = Permission::where('name', '!=', 'administrar-configuracion-del-sistema')
            ->where('name', '!=', 'administrar-usuarios-del-sistema')
            ->where('name', '!=', 'administrar-roles-del-sistema')
            ->get();
        // dd($permisos);
        return view('livewire.usuarios-admin.usuarios.mostrar-roles', compact('roles', 'permisos'));
    }

    public function createRole()
    {
        $val = '';
        if ($this->idRol) {
            $val = ',' . $this->idRol . '';
        }

        $this->validate(
            [
                'nombreDeRol' => 'required|unique:roles,name' . $val,
                'selectedPermissions' => 'required|array|min:1',
            ]
        );

        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Rol y Permisos Registrados Correctamente.';
        if ($this->idRol) {
            $role = Role::findOrFail($this->idRol);
            $role->name = $this->nombreDeRol;
            $role->save();
            $role->syncPermissions($this->selectedPermissions);
            $text = 'Rol y Permisos Actualizados Correctamente.';

            $this->emit('close-modal');
        } else {
            $role = Role::create(['name' => $this->nombreDeRol]);
            $role->syncPermissions($this->selectedPermissions);
        }


        // $this->roles = Role::all();
        // $this->permissions = Permission::all();
        $this->emit('alert', $title, $icon, $text);
        $this->resetUI();
    }

    public function Edit($idRol)
    {
        $role = Role::findOrFail($idRol);

        $this->idRol = $role->id;
        $this->nombreDeRol = $role->name;
        $this->selectedPermissions = $role->permissions()->pluck('id')->toArray();

        $this->emit('show-modal');
    }
}
