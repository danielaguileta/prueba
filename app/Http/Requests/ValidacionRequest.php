<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cantidad' => 'required|numeric',
              
    ];
    }

    public function messages()
    {
        return[
            /* Validacion campo NOMBRE CLIENTE */
             'cantidad.required' => 'El campo cantidad  es requerido. No puede estar vacio.' ,
              'cantidad.numeric' => 'El campo cantidad solo puede contener numeros.' ,
              
        ];
    }
}
