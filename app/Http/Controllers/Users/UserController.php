<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $userRole = auth()->user()->getRoleNames()->first();
        $persona = Personas::findOrFail(auth()->user()->persona_id);
        // return $persona;
        return view('users.index', compact('persona','userRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $roles = Role::get();
        // dd($roles);
        return view('users.verUsuarios');
    }

    public function mostrarRoles(){
        return view('users.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function changeUser(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'password_actual' => 'required|min:8',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = Auth::user(); //Instancia
        $userId = $user->id;
        $userEmail = $user->email;
        $userPassword = $user->password;

        if ($request->password_actual != "") {
            $NuevoPassword = $request->password;
            $confirmPassword = $request->password_confirmation;

            //Verifico si la clave actual es igual a la del usuario en sesión
            if (Hash::check($request->password_actual, $userPassword)) {
                //Valido que tanto el 1 como el 2 sean iguales
                if ($NuevoPassword == $confirmPassword) {
                    //Valido que la clave no sea menor a 6 digitos
                    $user->password = Hash::make($request->password);
                    $sqlBD = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['password' => $user->password]);
                    $notificationSuccess = "Contraseña actualizada correctamente";
                    return redirect()->route('mi.perfil.de.usuario')->with(compact('notificationSuccess'));
                } else {
                    $notification = "Las contraseña nueva y la confirmación no coinciden";
                    return redirect()->route('mi.perfil.de.usuario')->with(compact('notification'));
                }
            } else {
                $notification = "Su clave actual no coincide con nuestros registros";
                return redirect()->route('mi.perfil.de.usuario')->with(compact('notification'));
            }
        } else {
            $notification = "El Password actual no puede ser vacío";
            return redirect()->route('mi.perfil.de.usuario')->with(compact('notification'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
