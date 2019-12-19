<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignacionTarea extends Model
{
    protected $table = 'designacion_tarea';
    protected $fillable = ['evento_tarea_id','comite_id'];

    public function comite()
    {
        return $this->belongsTo('App\Comite');
    }

		public function evento_tarea()
    {
        return $this->belongsTo('App\EventoTarea');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    
    public function scopeSearchDesignacionTarea($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
