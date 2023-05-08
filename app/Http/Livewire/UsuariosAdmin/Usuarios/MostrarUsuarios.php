<?php

namespace App\Http\Livewire\UsuariosAdmin\Usuarios;

use App\Models\User;
use Livewire\Component;

class MostrarUsuarios extends Component
{
    public $title = 'CREAR USUARIOS';
    public $bancos = [];
    public function render()
    {
        $usuarios = User::all();
        
        return view('livewire.usuarios-admin.usuarios.mostrar-usuarios', compact('usuarios'));
    }
}
