<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
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
        return[
            'nombre'            =>  'required | min:1 | max:50',
            'apellidos'         =>  'required | min:1 | max:100',
            'fechanacimiento'   =>  'required | date',
            'correo'            =>  'required | min:5',
            'telefono'          =>  'nullable',
            'direccion'         =>  'nullable | max:100',
            'claveacceso'       =>  'required | min:5',
            'estadocivil'       =>  'nullable | max:30',
            'sueldoanual'       =>  'nullable',
        ];
    }
}
