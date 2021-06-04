<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'phone' => 'required|integer',
            'position' => 'required|string',
            'role_id' => 'required',
        ];

        if ($this->password != "") {
            $rules['password'] = 'required|confirmed';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'phone' => 'teléfono',
            'position' => 'puesto',
            'role' => 'rol'
        ];
    }
}
