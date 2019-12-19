<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoComite extends Model
{
    protected $table = 'tipo_comite';
    protected $fillable = ['name','descripcion'];

    public function comites()
    {
        return $this->hasMany('App\Comite');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchTipoComite($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
