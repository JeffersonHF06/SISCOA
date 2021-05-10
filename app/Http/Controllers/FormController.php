<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;

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
        // $request->user()->forms()->create($request->all());
        Form::create($request->all());
        return redirect('/forms')->with('status', 'Formulario creado con éxito');
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
