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
     * Método que redirige a la vista index de formularios.
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
     * Método que redirige a la vista create de formularios.
     */
    public function create()
    {
        return view('forms.create', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Método que inserta un nuevo formulario en la Base de Datos, recibe los parámetros:
     *
     * @param  \Illuminate\Http\Requests\StoreFormRequest $request el cual valida y a la vez contiene
     * los datos del formulario por insertar.
     * 
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
     * @param \App\Http\Requests\AddUserToFormRequest $request el cual valida y a la vez contiene los datos 
     * del usuario por registrar.
     * @param \App\Models\Form $form el cual es el formulario al que el usuario quiere registararse.
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
     * 
     * @param App\Models\Form $form el cuál es el formulario del que queremos obtener los registros.
     */
    public function getUsersForm(Form $form){
        return [
            'users' => $form->users,
            'noUsers' => count($form->users)
        ];
    }

    /**
     * Método para crear un PDF a partir de un formulario, recibe por parámetros: 
     * 
     * @param App\Models\Form $form el cual es el formulario del que se generará el PDF.
     */
    public function PDF(Form $form){
        $pdf = PDF::loadView('pdf.form',[
            'form' => $form
        ]);
        return $pdf->stream('Lista.pdf');
    }

    /**
     * Método que activa o desactiva el estado de un form, recibe por parámetros: 
     * 
     * @param \App\Models\Form $form formulario al que se le va a cambiar el estado.
     */
    public function switchActive(Form $form){
        $form->update(['is_active' => !$form->is_active]);
        return redirect('/forms')->with('status', 'Estado del formulario cambiado con éxito');
    }

    /**
     * Método que redirige a la vista de registro de un formulario en específico. Requiere un parámetro:
     *
     * @param  \App\Form  $form formulario específico.
     *
     */
    public function show(Form $form)
    {
        return view('forms.show',[
            'form' => $form
        ]);
    }

    /**
     * Método que redirige a la vista list, la cual muestra la lista de usuarios registrados en un formulario
     * en específico. Requiere un parámetro: 
     * 
     * @param \App\Models\Form $form el cual es el formulario del que se mostrará la lista de registrados.
     */
    public function showList(Form $form)
    {
        return view('forms.list',[
            'form' => $form
        ]);
    }

    /**
     * Método que busca en la base de datos un formulario que posea un motivo o fecha similares a los enviados
     * por el usuario.
     */
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
     * Método que redirige a la vista edit de un formulario en específico. Requiere un parámetro:
     *
     * @param  \App\Form  $form formulario a editar.
     * 
     */
    public function edit(Form $form)
    {
        return view('forms.edit', [
            'user' => Auth::user(),
            'form' => $form
        ]);
    }

    /**
     * Método que edita o actualiza los datos de un formulario específico. Requiere dos parámetros:
     *
     * @param  \Illuminate\Http\Requests\UpdateFormRequest  $request el cual valida y contiene los datos nuevos 
     * del formulario.
     * @param  \App\Form  $form el cual es el formulario a actualizar.
     * 
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        $form->update($request->all());
        return redirect('/forms')->with('status', 'Formulario editado con éxito');
    }

    /**
     * Método que elimina un formulario en específico. Requiere un parámetro:
     *
     * @param  \App\Form  $form formulario por eliminar.
     * 
     */
    public function destroy(Form $form)
    {
        $form->delete();
        return redirect('/forms')->with('status', 'Formulario eliminado con éxito');
    }
}
