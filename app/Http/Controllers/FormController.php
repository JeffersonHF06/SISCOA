<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\AddUserToFormRequest;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $forms = Form::where('user_id',$user->id)->paginate(8);
        return view('forms.index',[
            'forms' => $forms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        Form::create($request->all());
        return redirect('/forms')->with('status', 'Formulario creado con éxito');
    }

    /**
     * Método para registrar un usuario en una lista de asistencia o Form.
     * Requiere 2 paŕametros: 
     * 
     * @param \App\Http\Requests\AddUserToFormRequest el cual es el request que valida el objeto que llega 
     * del Front-End y a la vez contiene los datos del usuario por registrar.
     * @param \App\Models\Form el cual es el formulario por registrarse 
     * 
     * Por último, nos redirige de nuevo a la página de registro o form con un mensaje de error o de éxito.
     */
    public function addUserToForm(AddUserToFormRequest $request, Form $form){
        
        if($request->id == ""){
           $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'password' => Hash::make("default"),
            'role_id' => "3"
           ]);
        }
        else{
            $user = User::find($request->id);

            if($form->users()->firstWhere('user_id', '=', $user->id)){
                return redirect('/forms/'.$request->page)->with('error', 'El usuario ingresado ya se encuentra registrado');
            }
        }

        $form->users()->attach($user);

        return redirect('/forms/'.$request->page)->with('status', 'Ha sido registrado con éxito');
    }

    /**
     * Método que retorna los usuarios registrados en un form
     * recibe por parámetros: 
     * @param App\Models\Form el cuál es el formulario del que queremos obtener los registros
     */
    public function getUsersForm(Form $form){
        return [
            'users' => $form->users,
            'noUsers' => count($form->users)
        ];
    }

    public function PDF(Form $form){
        $pdf = PDF::loadView('pdf.form',[
            'form' => $form
        ]);
        // return $pdf->download('reference.pdf');
        return $pdf->stream('Lista.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        return view('forms.show',[
            'form' => $form
        ]);
    }

    public function showList(Form $form)
    {
        return view('forms.list',[
            'form' => $form
        ]);
    }

    public function search()
    {
        $search = request()->validate([
            'search' => 'required'
        ]);

        $searchByTitle = Form::where('title', 'like', $search['search'] . '%')->where('user_id', Auth::user()->id)->get();
        $searchByDate = Form::where('date', 'like', $search['search'] . '%')->where('user_id', Auth::user()->id)->get();

        $result = $searchByTitle->merge($searchByDate);

        return view('forms.search', [
            'forms' => $result
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        return view('forms.edit', [
            'user' => Auth::user(),
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        $form->update($request->all());
        return redirect('/forms')->with('status', 'Formulario editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();
        return redirect('/forms')->with('status', 'Formulario eliminado con éxito');
    }
}
