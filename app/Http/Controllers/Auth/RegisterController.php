<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Personas;
use App\Models\Clientes;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'genero' => ['required'],
            'telefono' => ['required', 'max:20'],
            'direccion' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
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
        //dd($data);
        
        Personas::create([
            'dni'=>$data['dni'],
            'nombre'=>$data['name_personal'],
            'apellidos'=>$data['apellido_personal'],
            'genero'=>$data['genero'],
            'telefono'=>$data['telefono'],
            'dirección'=>$data['direccion'],
        ]);
        
        $persona = DB::select('SELECT id FROM personas ORDER BY id DESC LIMIT 1');
        $persona_id=$persona[0]->id;

        $user_application=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'persona_id' => $persona_id
        ]);
        $user = DB::select('SELECT id FROM users ORDER BY id DESC LIMIT 1');
        $user_id=$user[0]->id;

        Clientes::create([
            'persona_id' => $persona_id,
            'user_id' => $user_id
        ]);
        return $user_application;
    }
}
