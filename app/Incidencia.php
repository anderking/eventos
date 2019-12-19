<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencia';
    protected $fillable = ['tarea_id','descripcion','cedula_resp','name_resp','telefono_movil','telefono_ofic','telefono_otro','estatus'];


	public function evento_tarea()
    {
        return $this->belongsTo('App\EventoTarea');
    }
    
    public function scopeSearch($query,$cedula_resp)
    {
        return $query->where('cedula_resp', 'LIKE', "%$cedula_resp%");
    }
    
    public function scopeSearchIncidencia($query,$cedula_resp)
    {
        return $query->where('cedula_resp', '=', $cedula_resp);
    }

}
