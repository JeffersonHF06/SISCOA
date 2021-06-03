<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            // 'is_active' => 'required',
            // 'user_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'motivo',
            'start_time' => 'hora de inicio',
            'end_time' => 'hora de finalización',
        ];
    }
}
