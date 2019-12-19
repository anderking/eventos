<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteHijo extends Model
{
    protected $table = 'cliente_hijo';
    protected $fillable = ['cliente_id','fecha_nac_hijo'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
