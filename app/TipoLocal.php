<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLocal extends Model
{
    protected $table = 'tipo_local';
    protected $fillable = ['name','descripcion'];

    public function locales()
    {
        return $this->hasMany('App\Local');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchLocal($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
