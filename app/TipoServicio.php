<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = 'tipo_servicio';
    protected $fillable = ['name','descripcion'];

    public function servicios()
    {
        return $this->hasMany('App\Servicio');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchTipoServicio($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
