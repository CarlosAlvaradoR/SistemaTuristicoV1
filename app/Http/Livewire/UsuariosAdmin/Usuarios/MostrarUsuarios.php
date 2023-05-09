<?php

namespace App\Http\Livewire\UsuariosAdmin\Usuarios;

use App\Models\Personas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class MostrarUsuarios extends Component
{
    public $title = 'CREAR USUARIOS';
    public $idPersona, $dni, $nombre, $apellidos, $genero, $telefono, $dirección;

    public $idUser, $name, $email, $password, $password_confirmation;

    public $rol;

    public function resetUI()
    {
    }
    public function render()
    {
        // $usuarios = User::with('roles')->get();
        // $usuarios = DB::table('personas as p')
        //     ->join('users as u', 'u.persona_id', '=', 'p.id')
        //     ->join('roles as r', 'users.role_id', '=', 'r.id')
        //     ->select('u.*', 'p.nombre', 'p.apellidos', 'u.email')

        //     ->get();
        $usuarios = Personas::select(
            'personas.nombre AS nombre_persona',
            'personas.apellidos',
            'users.name AS nombre_usuario',
            'users.email',
            'users.id',
            DB::raw('GROUP_CONCAT(roles.name SEPARATOR \', \') AS nombres_roles')
        )
            ->leftJoin('users', 'personas.id', '=', 'users.persona_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->groupBy('users.id')
            //->where('roles.name', 'admin')
            ->get();


        // foreach ($personasConUsuariosYRoles as $persona) {
        //     $nombrePersona = $persona->nombre_persona;
        //     $nombreUsuario = $persona->nombre_usuario;
        //     $nombresRoles = explode(', ', $persona->nombres_roles);
        //     // hacer algo con la información obtenida
        // }

        $roles = Role::pluck('name', 'name')->all();
        // $roles = Role::all();
        // dd($personasConUsuariosYRoles);
        return view('livewire.usuarios-admin.usuarios.mostrar-usuarios', compact('usuarios', 'roles'));
    }

    public function CrearUsuario()
    {
        $val = '';
        $valemail = '';
        if ($this->idPersona) {
            $val = ',' . $this->idPersona;
        }

        if ($this->idUser) {
            $valemail = ',email,' . $this->idUser;
        }

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
                'email' => 'required|string|email|max:255|unique:users' . $valemail,
                'password' => 'required|string|min:8|confirmed',
            ]
        );
        $rol = $this->validate(
            [
                'rol' => 'required'
            ]
        );
        $rol = Role::findByName($this->rol);
        if ($this->idUser) {
            $usuarios = User::findOrFail($this->idUser);
            $personas = Personas::findOrFail($usuarios->persona_id);


            $usuarios->email = $this->email;


            $personas->dni = $this->dni;
            $personas->nombre = $this->nombre;
            $personas->apellidos =  $this->apellidos;
            $personas->genero = $this->genero;
            $personas->telefono = $this->telefono;
            $personas->dirección = $this->dirección;

            $usuarios->save();
            $personas->save();
            $usuarios->syncRoles([$rol]);
        } else {
            $rol = Role::findByName($this->rol);

            // validar rol internamente

            $personas = Personas::crear($personas);
            $usuarios = User::create(
                [
                    'name' => $this->nombre,
                    'email' => $this->email,
                    'email_verified_at' => now(),
                    'password' => Hash::make($this->password),
                    'persona_id' => $personas->id,
                ]
            );
            $usuarios->assignRole($rol);
        }




        $this->emit('alert', 'MUY BIEN !', 'success', 'Usuario Creado Correctamente');
    }


    public function Edit($idUsuario)
    {
        $usuarios = User::findOrFail($idUsuario);
        $personas = Personas::findOrFail($usuarios->persona_id);

        $this->idUser = $usuarios->id;
        $this->email = $usuarios->email;

        $this->rol = $usuarios->roles->first()->name;
        // 'dni', 'nombre', '', '', '', ''
        $this->idPersona = $personas->id;
        $this->dni = $personas->dni;
        $this->nombre = $personas->nombre;
        $this->apellidos = $personas->apellidos;
        $this->genero = $personas->genero;
        $this->telefono = $personas->telefono;
        $this->dirección = $personas->dirección;

        $this->emit('show-modal');
    }
}
