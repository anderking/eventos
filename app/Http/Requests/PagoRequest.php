<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PagoRequest extends Request
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
            'evento_id'             =>'required',
            'descripcion'           =>'required',
            'fecha_pago'            =>'required|date|date_format:Y-m-d',
            'importe'               =>'requirid|numeric',
            'metodo_pago'           =>'required',
            'referencia_bancaria'   =>'required|unique:pago',
        ];
    }
}
