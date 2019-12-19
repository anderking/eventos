<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $fillable = ['letra_rif','rif','razon_social','descripcion','direccion','email','tiempo_respuesta','desempeño','calidad','responsabilidad','atencion','telefono_movil','telefono_ofic','telefono_otro','name_prov','apellido_prov','cedula_prov','email_prov','telefono_movil_prov','telefono_ofic_prov','telefono_otro_prov'];

    public function costos()
    {
        return $this->hasMany('App\Costo');
    }

    public function scopeSearch($query,$rif)
    {
        return $query->where('rif', 'LIKE', "%$rif%");
    }
    public function scopeSearchServicio($query,$rif)
    {
        return $query->where('rif', '=', $rif);
    }
    
}
