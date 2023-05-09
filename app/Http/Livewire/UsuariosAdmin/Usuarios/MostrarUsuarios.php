<?php

namespace App\Http\Livewire\UsuariosAdmin\Usuarios;

use App\Models\Personas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class MostrarUsuarios extends Component
{
    public $title = 'CREAR USUARIOS';
    public $dni, $nombre, $apellidos, $genero, $telefono, $dirección;

    public $name, $email, $password, $password_confirmation;

    public $rol;

    public function resetUI()
    {
    }
    public function render()
    {
        $usuarios = User::all();
        $roles = Role::pluck('name', 'name')->all();
        // $roles = Role::all();
        // dd($roles);
        return view('livewire.usuarios-admin.usuarios.mostrar-usuarios', compact('usuarios', 'roles'));
    }

    public function CrearUsuario()
    {
        $val = '';
        $personas = $this->validate(
            [
                'dni' => 'required|min:3|unique:personas,dni' . $val,
                'nombre' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'genero' => 'required|numeric|min:1|max:2',
                'telefono' => 'required|min:3',
                'dirección' => 'required|min:3',
            ]
        );

        $usuarios = $this->validate(
            [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]
        );
        $rol = $this->validate(
            [
                'rol' => 'required'
            ]
        );

        $rol = Role::findByName($this->rol);

        // validar rol internamente

        $personas = Personas::crear($personas);
        $usuarios = User::create(
            [
                'name' => $this->nombre,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'persona_id' => $personas->id,
            ]
        );

        $this->emit('alert', 'MUY BIEN !','success', 'Usuario Creado Correctamente');
    }
}
