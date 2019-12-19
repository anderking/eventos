<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $dates = ['fecha_pago'];
	protected $fillable = ['evento_id','descripcion','fecha_pago','importe','metodo_pago','referencia_bancaria','estatus'];

    public function evento()
    {
        return $this->belongsTo('App\Evento');
    }

    public function scopeSearch($query,$referencia_bancaria)
    {
        return $query->where('referencia_bancaria', 'LIKE', "%$referencia_bancaria%");
    }
    public function scopeSearchPago($query,$referencia_bancaria)
    {
        return $query->where('referencia_bancaria', '=', $referencia_bancaria);
    }
}
