<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddUserToFormRequest;
use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;

class FormController extends Controller
{
    /**
     * Muestra una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('forms.index', [
            'forms' => Form::where('user_id', $user->id)->paginate(5)
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        Form::create($request->all() + [
            'user_id' => $request->user()->id,
            'uuid' => Str::uuid(),
            'is_active' => '1'
        ]);

        return redirect()->route('forms.index')->with('status', __('The form was created successfully.'));
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
    // public function addUserToForm(AddUserToFormRequest $request, Form $form)
    public function addUserToForm(AddUserToFormRequest $request, $uuid)
    {
        $form = Form::where('uuid', $uuid)->first();

        if (!$form) {
            abort(404);
        }

        if ($request->id == "") {
            $user = User::create($request->validated() + [
            'password' => 'default',
            'role_id' => '3',
            'is_active' => '1']);
        } else {
            $user = User::find($request->id);

            if ($form->users()->firstWhere('user_id', '=', $user->id)) {
                return redirect()->back()->with('error', __('The user was already registered in this form'));
            }
        }

        $form->users()->attach($user);

        return redirect()->back()->with('status', __('Registered succesfully'));
    }

    /**
     * Método que retorna los usuarios registrados en un form
     * recibe por parámetros: 
     * 
     * @param App\Models\Form $form el cuál es el formulario del que queremos obtener los registros.
     */
    public function getUsersForm(Form $form)
    {
        $this->authorize('subscribers', $form);

        return [
            'users' => $form->users->load(['position','career']),
            'noUsers' => count($form->users)
        ];
    }

    /**
     * Método para crear un PDF a partir de un formulario, recibe por parámetros: 
     * 
     * @param App\Models\Form $form el cual es el formulario del que se generará el PDF.
     */
    public function PDF(Form $form)
    {
        $this->authorize('pdf', $form);

        $pdf = PDF::loadView('pdf.form', [
            'form' => $form
        ]);

        return $pdf->stream('Lista.pdf');
    }

    /**
     * Método que activa o desactiva el estado de un form, recibe por parámetros: 
     * 
     * @param \App\Models\Form $form formulario al que se le va a cambiar el estado.
     */
    public function switchActive(Form $form)
    {
        $this->authorize('update', $form);

        $form->update(['is_active' => !$form->is_active]);

        return redirect()->route('forms.index')->with('status', __('The state of the form was successfully modified.'));
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return view('forms.show', [
            'form' => Form::where('uuid', $uuid)->first()
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
        $this->authorize('subscribers', $form);

        return view('forms.list', [
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

        /**
         * Changed.
         */
        $forms = Form::where('title', 'like', '%' . $search['search'] . '%')
            ->orWhere('date', 'like', '%' . $search['search'] . '%')->get()
            ->where('user_id', auth()->user()->id);

        return view('forms.search', [
            'forms' => $forms
        ]);
    }

    /**
     * Muestre el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        $this->authorize('update', $form);

        return view('forms.edit', [
            'form' => $form
        ]);
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Requests\UpdateFormRequest  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest $request, Form $form)
    {
        $this->authorize('update', $form);

        $form->update($request->validated());

        return redirect()->route('forms.index')->with('status', __('The form was successfully edited.'));
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $this->authorize('delete', $form);

        if ($form->users->isNotEmpty()) {
            return redirect('/forms')->with('error', __('Can not delete this form because some users are already register on it'));
        }

        $form->delete();

        return redirect()->route('forms.index')->with('status', __('The form was successfully removed.'));
    }
}
