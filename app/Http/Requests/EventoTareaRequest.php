<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventoTareaRequest extends Request
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
            'evento_id'         => 'required',
            'tarea_id'          => 'required',
            'fecha_inicio'      =>'required|date|date_format:Y-m-d',
            'fecha_fin'         =>'required|date|date_format:Y-m-d'
        ];
    }
}
