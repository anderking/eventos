<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionCosto extends Model
{
    protected $table = 'cotizacion_costo';
    protected $fillable = ['cotizacion_id','costo_id','cantidad'];



    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchCotizacionCosto($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
