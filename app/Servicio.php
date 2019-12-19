<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $fillable = ['tipo_servicio_id','name','descripcion'];

    public function tipo_servicio()
    {
        return $this->belongsTo('App\TipoServicio');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchServicio($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
