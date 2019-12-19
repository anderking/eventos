<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $dates = ['fecha_evento'];
    
    protected $fillable = ['cotizacion_id','tipo_evento_id','fecha_evento','hora_inicio','hora_fin','nro_cuotas','estatus'];

    public function cotizacion()
    {
        return $this->belongsTo('App\Cotizacion');
    }
    public function tipo_evento()
    {
        return $this->belongsTo('App\TipoEvento');
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago');
    }

    public function evento_tareas()
    {
        return $this->hasMany('App\EventoTarea');
    }

    public function scopeSearch($query,$id)
    {
        return $query->where('id', 'LIKE', "%$id%");
    }
    public function scopeSearchEvento($query,$id)
    {
        return $query->where('id', '=', $id);
    }


}
