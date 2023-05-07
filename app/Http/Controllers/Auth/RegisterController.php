<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Personas;
use App\Models\Clientes;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
//SPATIE
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        
        
        return Validator::make($data, [
            'dni' => ['required', 'string', 'max:255', 'unique:personas'],
            'name_personal' => ['required', 'string', 'max:255'],
            'apellido_personal' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'numeric','min:1','max:2'],
            'telefono' => ['required', 'max:20'],
            'direccion' => ['required', 'string', 'max:255'],
            'nacionalidad' => ['required', 'numeric', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        ///dd($data);
        
        $persona = Personas::create([
            'dni'=>$data['dni'],
            'nombre'=>strtoupper($data['name_personal']),
            'apellidos'=>strtoupper($data['apellido_personal']),
            'genero'=>$data['genero'],
            'telefono'=>$data['telefono'],
            'dirección'=>$data['direccion'],
        ]);
        
        $persona_id = $persona->id;

        $user=User::create([
            'name' => strtoupper($data['name_personal']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'persona_id' => $persona_id
        ]);
        $user_id = $user->id;

        $cliente = Clientes::create([
            'persona_id' => $persona_id,
            'user_id' => $user_id,
            'nacionalidad_id' => $data['nacionalidad']
        ]);
        //Rol de Cliente y genéricamente trabajadores
        $user->assignRole('cliente');

        return $user;
    }


    protected function redirectTo(){
        if (Auth::user()->hasRole('cliente')) {
            return route("cliente.perfil");
        }

        /*if (Auth::user()->hasRole('admin')) {
            # code...
        }*/


        return "/home";
    }
}