<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el perfil de usuario registrado.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.profile', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()
            ->route('profile.index')
            ->with('status', 'Hey');
    }
}
