<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentarioTarea extends Model
{
    protected $table = 'comentario_tarea';
    protected $fillable = ['designacion_tarea_id','comentario','fecha'];
}
