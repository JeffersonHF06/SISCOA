<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use App\Models\Role;
use App\Models\Position;
use App\Models\Career;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        return view('users.index', [
            'users' => User::paginate(5)
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('users.create', [
            'roles' => Role::all(),
            'positions' => Position::all(),
            'careers' => Career::all()
        ]);
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);

        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('status', __('The user was created successfully.'));
    }

    /**
     * Muestre el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

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
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->validated());

        return $request->routeIs('users.update') ?
            redirect()->route('users.index')->with('status', __('The user was edited successfully.')) :
            redirect()->route('users.profile')->with('status', __('Your personal information has been edited correctly.'));
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        if ($user->forms->isNotEmpty()) {
            return redirect()
                ->route('users.index')
                ->with('error', __('Can not delete an user that owns a form or is register in one'));
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('status', __('The user was successfully removed.'));
    }

    /**
     * Muestra una lista personalizada del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $request->validate([
            'search' => 'required'
        ]);

        $search = $request->search;

        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhereHas('career', function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('position', function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('role', function (Builder $query) use ($search) {
                $query->where('label', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('users.index', [
            'users' => $users,
            'search' => $search
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
     * Método que activa o desactiva el estado de un usuario, recibe por parámetros: 
     * 
     * @param \App\User $user usuario al que se le va a cambiar el estado.
     */
    public function switchActive(User $user)
    {
        $this->authorize('update', $user);

        $user->update(['is_active' => !$user->is_active]);

        return redirect()
            ->route('users.index')
            ->with('status', __('User status changed successfully'));
    }
}
