<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProveedorUpdateRequest extends Request
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
            'letra_rif'             =>'required',
            'rif'                   =>'required|min:1|max:15',
            'razon_social'          =>'required',
            'descripcion'           =>'required',
            'direccion'             =>'required',
            'email'                 =>'required|email',
            'tiempo_respuesta'      =>'required',
            'desempeño'             =>'required',
            'calidad'               =>'required',
            'responsabilidad'       =>'required',
            'atencion'              =>'required',
            'telefono_movil'        =>'numeric',
            'telefono_ofic'         =>'numeric',
            'telefono_otro'         =>'numeric',
            'name_prov'             =>'required|regex:/^[\pL\s\-]+$/u|min:1|max:100',
            'apellido_prov'         =>'required|regex:/^[\pL\s\-]+$/u|min:1|max:100',
            'cedula_prov'           =>'required|numeric',
            'email_prov'            =>'required|email',
            'telefono_movil_prov'   =>'numeric',
            'telefono_ofic_prov'    =>'numeric',
            'telefono_otro_prov'    =>'numeric'
        ];
    }
}
