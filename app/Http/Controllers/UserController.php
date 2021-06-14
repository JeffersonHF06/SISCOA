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
    /**
     * Muestra una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $request->validate(['search' => 'required']);

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
     * Método para obtener todas las posiciones.
     * 
     */
    public function getPositionsAndCareers()
    {
        return [
            'positions' => Position::all(),
            'careers' => Career::all()
        ];
    }

    /**
     * Método que elimina un usuario en específico. Requiere un paraámetro:
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function switchActive(User $user)
    {
        $user->update(['is_active' => !$user->is_active]);

        return redirect()
            ->route('users.index')
            ->with('status', __('User status changed successfully'));
    }

    public function profile()
    {
        return view('users.profile', [
            'user' => auth()->user()
        ]);
    }
}
