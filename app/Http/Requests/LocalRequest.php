<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LocalRequest extends Request
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
            'tipo_local_id'     =>'required',
            'name'              =>'required',
            'direccion'         =>'required',
            'descripcion'       =>'required',
            'capacidad'         =>'required|numeric',
            'estacionamiento'   =>'required',
            'capacidad_est'     =>'numeric',
            'cant_baños'        =>'required',
            'vigilancia'        =>'required',
            'precio_alquiler'   =>'required|numeric',
            'IVA'               =>'required|numeric',
            'precio_venta'      =>'required|numeric',
            'cedula_admin'      =>'required|numeric',
            'name_admin'        =>'required|regex:/^[\pL\s\-]+$/u|min:1|max:100',
            'apellido_admin'    =>'required|regex:/^[\pL\s\-]+$/u|min:1|max:100',
            'email_admin'       =>'required|email',
            'telefono_movil'    =>'alpha_num',
            'telefono_ofic'     =>'alpha_num',
            'telefono_otro'     =>'alpha_num',

        ];
    }
}
