<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTarea extends Model
{
    protected $table = 'tipo_tarea';
    protected $fillable = ['name','descripcion'];

    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchTipoTarea($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
