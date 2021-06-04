<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as GG;

class FormRequest extends GG
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
            'title'       => 'required|string',
            'description' => 'required|string',
            'date'        => 'required|date',
            'start_time'  => 'required',
            'end_time'    => 'required'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title'      => 'motivo',
            'start_time' => 'hora de inicio',
            'end_time'   => 'hora de finalización'
        ];
    }
}
