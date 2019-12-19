<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rol_id','email','password','cedula','name','apellido','sex','fecha','direccion','telefono_movil','telefono_ofic','telefono_otro'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    public function comites()
    {
        return $this->belongsToMany('App\Comite','designacion_comite')->withTimestamps();
    }

    public function admin(){
        return $this->rol->name==="Administrador";
    }

    public function recepcionista(){
        return $this->rol->name==="Recepcionista";
    }

    public function planificador(){
        return $this->rol->name==="Planificador";
    }

    public function coordinador(){
        return $this->rol->name==="Coordinador";
    }

    public function empleado(){
        return $this->rol->name==="Empleado";
    }

    public function cliente(){
        return $this->rol->name==="Cliente";
    }

    public function gerente(){
        return $this->rol->name==="Gerente";
    }


    public function hasBeenUpdated()
    {
        return $this->updated_at != $this->created_at;
    }

    public function scopeSearch($query,$cedula)
    {
        return $query->where('users.cedula', 'LIKE', "%$cedula%");
    }
    public function scopeSearchServicio($query,$cedula)
    {
        return $query->where('users.cedula', '=', $cedula);
    }
}
