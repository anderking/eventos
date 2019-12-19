<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoTarea extends Model
{
    protected $dates = ['fecha_inicio','fecha_fin','fecha_resolucion'];
    protected $table = 'evento_tarea';
    protected $fillable = ['evento_id','tarea_id','fecha_inicio','fecha_fin','fecha_resolucion','estatust'];

    public function evento()
    {
        return $this->belongsTo('App\Evento');
    }

    public function tarea()
    {
        return $this->belongsTo('App\Tarea');
    }

    public function designacion_tareas()
    {
        return $this->belongsToMany('App\DesignacionTarea','designacion_tarea')
                    ->withTimestamps();        
    }

    public function incidencias()
    {
        return $this->hasMany('App\Incidencia');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('evento_tarea.id', 'LIKE', "%$id%");
    }
    public function scopeSearchEventoTarea($query,$id)
    {
        return $query->where('evento_tarea.id', '=', $id);
    }
}
