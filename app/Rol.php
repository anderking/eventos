<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $fillable = ['name','descripcion','estatus'];


    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchRol($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
