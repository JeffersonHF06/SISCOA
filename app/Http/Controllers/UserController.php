<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Form;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Método que redirige a la página index de usuarios.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::paginate(8)
        ]);
    }

    /**
     * Método que retorna el usuario que contenga un email específico. Requiere un parámetro:
     * 
     * @param String $email el cual es el email específico por el cual buscar al usuario.
     */
    public function getUser(String $email)
    {

        return User::where('email', $email)->get();
    }

    /**
     * Método que redirige a la vista create de usuarios.
     */
    public function create()
    {
        return view('users.create', [
            'user' => Auth::user(),
            'roles' => Role::all()
        ]);
    }

    /**
     * Método que inserta un nuevo usuario en la base de datos. Requiere un parámetro:
     *
     * @param  \Illuminate\Http\Requests\StoreUserRequest  $request el cual valida y contiene los datos del nuevo 
     * usuario.
     */
    public function store(StoreUserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());

        return redirect('/users')->with('status', 'Usuario creado con éxito');
    }

    /**
     * Método que redirige a la vista edit de usuarios, requiere un parámetro:
     *
     * @param \App\User $user el cual es el usuario por editar.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Método que actualiza los datos de un usuario. Requiere dos parámetros:
     *
     * @param  \Illuminate\Http\Requests\UpdateUSerRequest  $request el cual valida y contiene los datos por actualizar
     * del usuario,
     * @param  \App\User $user el cual es el usuario por actualizar.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validateEmail = User::where('email', $request->email)->first();
        if ($user != $validateEmail) {
            return redirect()->back()->withErrors(['email' => 'El correo electrónico ya ha sido registrado.']);
        }

        if ($request->password != "") {
            $request->merge(['password' => Hash::make($request->password)]);
        } else {
            $request->merge(['password' => $user->password]);
        }

        $user->update($request->all());
        $user->refresh();
        return redirect('/users')->with('status', 'Usuario editado con éxito');
    }

    /**
     * Método que busca en la base de datos un usuario que posea un nombre o email similares a los enviados
     * por el usuario.
     */
    public function search()
    {
        $search = request()->validate([
            'search' => 'required'
        ]);

        $users = User::where('name', 'like', '%' . $search['search'] . '%')
            ->orWhere('email', 'like', '%' . $search['search'] . '%')->get();

        return view('users.search', [
            'users' => $users
        ]);
    }

    /**
     * Método que elimina un usuario en específico. Requiere un paraámetro:
     *
     * @param  \App\User $user el cual es el usuario por eliminar.
     */
    public function destroy(User $user)
    {

        if ($user->forms->isNotEmpty()) {
            return redirect('/users')->with('error', 'No puede eliminar el usuario ya que se encuentra registrado en un formulario o es dueño de alguno.');
        }
        $user->delete();
        return redirect('/users')->with('status', 'Usuario eliminado con éxito');
    }
}
