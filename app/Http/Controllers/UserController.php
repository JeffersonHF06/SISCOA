<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index',[
            'users' => User::paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create',[
            'user' => Auth::user(),
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());

        return redirect('/users')->with('status', 'Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validateEmail = User::where('email', $request->email)->first();
        if ($user != $validateEmail) {
            return redirect()->back()->withErrors(['email' => 'El correo electrónico ya ha sido registrado.']);
        }

        $request->merge(['password' => Hash::make($request->password)]);
        $user->update($request->all());
        $user->refresh();
        return redirect('/users')->with('status', 'Usuario editado con éxito');
    }

    public function search()
    {
        $search = request()->validate([
            'search' => 'required'
        ]);

        $searchByName = User::where('name', 'like', $search['search'] . '%')->get();
        $searchByEmail = User::where('email', 'like', $search['search'] . '%')->get();

        $result = $searchByName->merge($searchByEmail);

        return view('users.search', [
            'users' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with('status', 'Usuario eliminado con éxito');
    }
}
