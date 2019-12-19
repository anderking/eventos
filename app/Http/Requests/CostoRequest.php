<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CostoRequest extends Request
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
            'item_id'           =>'required',
            'proveedor_id'      =>'required',
            'precio_compra'     =>'required|numeric',
            'IVA'               =>'numeric',
            'precio_venta'      =>'numeric'
        ];
    }
}