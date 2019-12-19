<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizacion';
    protected $fillable = ['local_id','cliente_id','descripcion','nro_invitados','monto_total_venta','monto_total_iva','monto_presupuesto','estatus'];

    public function local()
    {
        return $this->belongsTo('App\Local');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function costos()
    {
        return $this->belongsToMany('App\Costo','cotizacion_costo')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    public function evento()
    {
        return $this->hasOne('App\Evento');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchCotizacion($query,$id)
    {
        return $query->where('id', '=', $id);
    }

    public function getNameForSelectAttribute()
    {
        return "{$this->id} , {$this->cliente->cedula} , {$this->cliente->name} {$this->cliente->apellido} , {$this->descripcion}";
    }
}
