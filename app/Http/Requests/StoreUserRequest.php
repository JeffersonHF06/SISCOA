<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|integer',
            'position_id' => 'required',
            'career_id' => 'required',
            'password' => 'required|confirmed',
            'role_id' => 'required'
        ];
    }

    public function attributes(){
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'phone' => 'teléfono',
            'password' => 'contraseña',
            'role_id' => 'rol',
            'position_id' => 'puesto',
            'career_id' => 'carrera'
        ];
    }
}
