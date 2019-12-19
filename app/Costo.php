<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costo extends Model
{
    protected $table = 'costo';
    protected $fillable = ['item_id','proveedor_id','precio_compra','IVA','precio_venta'];
        
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    public function cotizaciones()
    {
        return $this->belongsToMany('App\Cotizacion','cotizacion_costo')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
    
    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    
    public function scopeSearchCosto($query,$id)
    {
        return $query->where('id', '=', $id);
    }
}
