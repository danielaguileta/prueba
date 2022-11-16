<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionDepoRequest extends FormRequest
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
            //
            'cantidad_deposito' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return[
            /* Validacion campo NOMBRE CLIENTE */
            'cantidad_deposito.required' => 'El campo nombre  es requerido. No puede estar vacio.' ,
            'cantidad_deposito.numeric' => 'El campo cantidad solo puede contener numeros.' ,
        ];
    }
}

