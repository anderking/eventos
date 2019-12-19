<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventoRequest extends Request
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
            'cotizacion_id'     =>  'required',
            'tipo_evento_id'    =>  'required',
            'fecha_evento'      =>  'required|date|date_format:Y-m-d|after:today',
            'hora_inicio'       =>  'required',
            'hora_fin'          =>  'required',
        ];
    }
}
