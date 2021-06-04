<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        if($this->kind == 1){
            if($this->password != ""){
                return [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'phone' => 'required|integer',
                    'position_id' => 'required',
                    'career_id' => 'required',
                    'role_id' => 'required',
                    'password' => 'required|confirmed',
                ];
            }
    
            return [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|integer',
                'career_id' => 'required',
                'position_id' => 'required',
                'role_id' => 'required'
            ];
        }
        else{
            if($this->password != ""){
                return [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'phone' => 'required|integer',
                    'password' => 'required|confirmed',
                ];
            }
    
            return [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|integer',
            ];
        }
    }

    public function attributes(){
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'phone' => 'teléfono',
            'position' => 'puesto',
            'role' => 'rol'
        ];
    }
}
