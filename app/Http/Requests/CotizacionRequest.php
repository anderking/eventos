<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CotizacionRequest extends Request
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
            'local_id'              =>'required',
            'cliente_id'            =>'required',
            'descripcion'           =>'required',
            'nro_invitados'         =>'required|numeric',
        ];
    }
}
