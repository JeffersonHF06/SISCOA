<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'        => 'required|string',
            'phone'       => 'required|integer',
        ];

        if (!$this->routeIs('users.profile.update')) {
            $rules += [
                'role_id'     => 'required|integer',
                'position_id' => 'required|integer',
                'career_id'   => 'required|integer',
            ];
        }

        $rules['email'] = [
            'required',
            'email',
            $this->routeIs('users.store') ? 'unique:users,email' : 'unique:users,email,' . $this->user->id
        ];

        if ($this->routeIs('users.store') || $this->filled('password')) $rules += ['password' => 'required|confirmed'];

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'position_id' => 'puesto',
            'career_id'   => 'carrera',
            'role_id'     => 'rol'
        ];
    }
}
