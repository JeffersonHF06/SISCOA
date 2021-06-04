<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Models\Role;
use App\Models\Position;
use App\Models\Career;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra una lista del recurso.
     *
     * @return \Illuminate\Http\Response
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
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'user' => Auth::user(),
            'roles' => Role::all(),
            'positions' => Position::all(),
            'careers' => Career::all()
        ]);
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);

        User::create($request->all() + ['is_active' => '1']);

        return redirect()->route('users.index')->with('status', __('The user was created successfully.'));
    }

    /**
     * Muestre el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'positions' => Position::all(),
            'careers' => Career::all()
        ]);
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validateEmail = User::where('email', $request->email)->first();
        if ($user != $validateEmail && !empty($validateEmail)) {
            return redirect()->back()->withErrors(['email' => __('This email belongs to another user.')]);
        }

        if ($request->password != "") {
            $request->merge(['password' => Hash::make($request->password)]);
        } else {
            $request->merge(['password' => $user->password]);
        }

        $user->update($request->all());
        $user->refresh();

        if ($request->kind == 1) {
            return redirect('/users')->with('status', __('User edited successfully'));
        } else {
            return redirect('/users/profile')->with('status', __('User information edited successfully'));
        }
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
     * Método que activa o desactiva el estado de un usuario, recibe por parámetros: 
     * 
     * @param \App\User $user usuario al que se le va a cambiar el estado.
     */
    public function switchActive(User $user)
    {
        $user->update(['is_active' => !$user->is_active]);
        return redirect('/users')->with('status', __('User status changed successfully'));
    }

    /**
     * Método que redirige a la vista profile para modificación de datos del usuario en sesión
     */
    public function profile()
    {
        return view('users.profile', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->forms->isNotEmpty()) {
            return redirect('/users')->with('error', __('Can not delete an user that owns a form or is register in one'));
        }

        $user->delete();

        return redirect()->route('users.index')->with('status', __('The user was successfully removed.'));
    }
}
