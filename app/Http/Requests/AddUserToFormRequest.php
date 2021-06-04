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
        return [
            'email'       => $this->filled('id') ? 'required|email' : 'required|email|unique:users,email',
            'name'        => 'required|string',
            'phone'       => 'required|integer',
            'position_id' => 'required',
            'career_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'position_id' => 'puesto',
            
            // Revisar porque algunas a están.
            // 'email' => 'correo electrónico',
            // 'name' => 'nombre',
            // 'phone' => 'teléfono',
        ];
    }
}
