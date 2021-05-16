<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserToFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->id != ""){
            return [
                'email' => 'required',
                'name' => 'required|string',
                'phone' => 'required|integer',
                'position' => 'required|string',
            ];
        }else{
            return [
                'email' => 'required|email|unique:users,email',
                'name' => 'required|string',
                'phone' => 'required|integer',
                'position' => 'required|string',
            ];
        }
    }

    public function attributes(){
        return [
            'email' => 'correo electrónico',
            'name' => 'nombre',
            'phone' => 'teléfono',
            'position' => 'puesto',
        ];
    }
}
