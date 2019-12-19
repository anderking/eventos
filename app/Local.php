<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'local';
    protected $fillable = ['tipo_local_id','name','descripcion','direccion','capacidad','estacionamiento','capacidad_est','cant_baños','precio_alquiler','IVA','precio_venta','vigilancia','cedula_admin','name_admin','apellido_admin','email_admin','telefono_movil','telefono_ofic','telefono_otro'];

    public function tipo_local()
    {
        return $this->belongsTo('App\TipoLocal');
    }

    public function cotizaciones()
    {
        return $this->hasMany('App\Cotizacion');
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
