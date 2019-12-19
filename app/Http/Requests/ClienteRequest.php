<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClienteRequest extends Request
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
            'cedula'            =>'required|numeric|unique:cliente',
            'name'              =>'required|regex:/^[\pL\s\-]+$/u',
            'apellido'          =>'required|regex:/^[\pL\s\-]+$/u',
            'fecha_nac'         =>'required|date|date_format:Y-m-d|before:today',
            'edo_civil'         =>'required',
            'email'             =>'required|email',
            'direccion'         =>'required',
            'telefono_movil'    =>'numeric',
            'telefono_ofic'     =>'numeric',
            'telefono_otro'     =>'numeric'
        ];
    }
}
