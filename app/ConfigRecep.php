<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigRecep extends Model
{
    protected $table = 'config_recep';
    protected $fillable = ['indicador_cuota','porc_cuota'];
}
