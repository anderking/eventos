<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = ['servicio_id','descripcion','stock'];

    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }
    
    public function costos()
    {
        return $this->hasMany('App\Costo');
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
