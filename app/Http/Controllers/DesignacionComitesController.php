<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DesignacionComiteRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DesignacionComite;
use App\User;
use App\Comite;
use DB;


class DesignacionComitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $designacioncomites = DesignacionComite::Search($request->id)->orderBy('id','ASC')->get();
        return view('coordinador.designacioncomites.index')->with('designacioncomite',$designacioncomites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users_all = User::all();
        $comites_all = Comite::all();
        $users = User::orderBy('id','ASC')->where('rol_id','=','5')->lists('cedula','id');
        $comites = Comite::orderBy('id','ASC')->lists('name','id');
        $comites->prepend('Seleccione un Comité','');


        return view('coordinador.designacioncomites.create')->with(['user'=>$users,'comite'=>$comites,'user_all'=>$users_all,'comite_all'=>$comites_all]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignacionComiteRequest $request)
    {
        $comites = Comite::findOrFail($request->get('comite_id'));
        $users = $request->get('user_id', []);
        $comites->users()->sync($users);
        Flash('Empleado Desginado Correctamente','info');
        return redirect()->route('coordinador.designacioncomites.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designacioncomites = DesignacionComite::findOrFail($id);
        $users = User::orderBy('id','ASC')->where('rol_id','=','5')->lists('cedula','id');
        $comites = Comite::orderBy('id','ASC')->lists('name','id');

        return view('coordinador.designacioncomites.edit')->with(['user'=>$users,'comite'=>$comites,'designacioncomite'=>$designacioncomites]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
