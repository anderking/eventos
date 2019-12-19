<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServicioRequest extends Request
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
            'tipo_servicio_id'  =>'required',
            'name'              =>'required|min:1',
            'descripcion'       =>'required|min:1'
        ];
    }
}
