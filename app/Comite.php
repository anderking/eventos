<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    protected $table = 'comite';
    protected $fillable = ['tipo_comite_id','name','descripcion'];


    public function tipo_comite()
    {
        return $this->belongsTo('App\TipoComite');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','designacion_comite')->withTimestamps();
    }

    
    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchComite($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
