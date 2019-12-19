<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'rol_id'            =>'required',
            'email'             => 'required|unique:users|max:100',
            'password'          =>'min:4|max:16',
            'cedula'            =>'required|numeric|unique:users',
            'name'              =>'required|regex:/^[\pL\s\-]+$/u|min:1|max:100',
            'apellido'          =>'required|regex:/^[\pL\s\-]+$/u|min:1|max:100',
            'fecha'             =>'required|date|date_format:Y-m-d|before:today',
            'direccion'         =>'required|min:1',
            'telefono_movil'    =>'alpha_num|min:1',
            'telefono_ofic'     =>'alpha_num|min:1',
            'telefono_otro'     =>'alpha_num|min:1'
        ];
    }
}
