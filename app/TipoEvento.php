<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = 'tipo_evento';
    protected $fillable = ['name','descripcion'];
    
    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchTipoEvento($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
