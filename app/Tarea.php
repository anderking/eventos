<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tarea';
    protected $fillable = ['tipo_tarea_id','name','descripcion'];


    public function tipo_tarea()
    {
        return $this->belongsTo('App\TipoTarea');
    }

	public function evento_tareas()
    {
        return $this->hasMany('App\EventoTarea');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchTarea($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
