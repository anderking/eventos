<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table = 'cliente';
	protected $fillable = ['cedula','name','apellido','sex','fecha_nac','fecha_nac_hijo','edo_civil','email','direccion','telefono_movil','telefono_ofic','telefono_otro'];

  public function cotizaciones()
  {
    return $this->hasMany('App\Cotizacion');
  }

  public function hijos()
  {
    return $this->hasMany('App\ClienteHijo');
  }

	public function scopeSearch($query,$cedula)
  {
      return $query->where('cedula', 'LIKE', "%$cedula%");
  }
    
  public function scopeSearchCliente($query,$cedula)
  {
      return $query->where('cedula', '=', $cedula);
  }
}
