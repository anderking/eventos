<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Rol;
use DB;

class UsersController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {
        if($request->has('cedula'))
            $users = User::Search($request->cedula)->orderBy('id','ASC')->get();
        else
            $users = User::Search($request->id)->orderBy('id','ASC')->get();

        $users->each(function($users){
            $users->rol;
        });
        return view('admin.users.index')->with('user',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol_alls= Rol::all();
        $roles = Rol::orderBy('name','ASC')->lists('name','id');
        $roles->prepend('Seleccione un Tipo de Rol','');
        return view('admin.users.create')->with(['rol_all'=>$rol_alls,'rol'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $users = new User($request->all());
        $users->name = ucwords($request->name);
        $users->password = bcrypt($request->password);
        Flash('Usuario Registrado Correctamente', 'info');
        $users->save();
        return redirect()->route('admin.users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.show')->with('user',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Rol::orderBy('name','ASC')->lists('name','id');
        return view('admin.users.edit')->with(['user'=>$users,'rol'=>$roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->fill($request->all());
        $password = $users->password;
        if ($request->password!="")
            $users->password = bcrypt($request->password);
        else
            $users->password = $password ;
        
        $rules = array(
                        'rol_id'    => 'unique:users,rol_id,'.$id,
                        'email'     => 'unique:users,email,'.$id,
                        'cedula'    => 'unique:users,cedula,'.$id,
                        'user'      => 'unique:users,user,'.$id
                        );
        $messages = array(
                        'rol_id.unique'     =>'El Rol ya está registrado en la base de datos',
                        'email.unique'      =>'El Email ya está registrado en la base de datos',
                        'cedula.unique'     =>'La Cedula ya está registrada en la base de datos',
                        'user.unique'       =>'El Usuario ya está registrada en la base de datos');

        $this->validate($request,$rules,$messages); 

        $users->name = ucwords($request->name);
        Flash('Usuario Actualizado Correctamente','info');
        $users->update();
        return redirect()->route('admin.users.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if ( Auth::user()->id == $id )
        {
            Flash('No se puede eliminar este usuario, por estar auntentificado','danger');
            return redirect()->route('admin.users.index');
        }
        else
        {
            $users->delete();
            Flash('Usuario Eliminado Correctamente','danger');
            return redirect()->route('admin.users.index');
        }
    }
   
}
