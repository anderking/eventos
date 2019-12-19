<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RolRequest;
use App\Http\Controllers\Controller;

use App\Rol;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Rol::Search($request->id)->orderBy('id','ASC')->get();
        return view('admin.roles.index')->with('rol',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolRequest $request)
    {
        $roles = new Rol($request->all());
        Flash('Rol Registrado Correctamente', 'info');
        $roles->save();
        return redirect()->route('admin.roles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Rol::findOrFail($id);
        return view('admin.roles.show')->with('rol',$roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Rol::findOrFail($id);
        return view('admin.roles.edit')->with('rol',$roles);
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
        $roles = Rol::findOrFail($id);
        $roles->fill($request->all());

        $rules = array('name'  => 'unique:rol,name,'.$id);
        $messages = array('name.unique'  =>'Ya existe este Rol');
        $this->validate($request,$rules,$messages);

        Flash('Rol Actualizado Correctamente','info');
        $roles->update();
        return redirect()->route('admin.roles.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Rol::findOrFail($id);
        $roles->estatus='I';
        $roles->update();
        Flash('Rol Eliminado Correctamente','danger');
        return redirect()->route('admin.roles.index');
    }
}
