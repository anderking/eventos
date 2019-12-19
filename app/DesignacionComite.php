<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignacionComite extends Model
{
    protected $table = 'designacion_comite';
    protected $fillable = ['user_id','comite_id'];

    public function designacion_tareas()
    {
        return $this->belongsToMany('App\DesignacionTarea','designacion_tarea')
                    ->withTimestamps();        
    }
    
    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    
    public function scopeSearchDesignacionComite($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
