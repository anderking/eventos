<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComiteRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoComite;
use App\Comite;
use DB;

class ComitesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comites = Comite::Search($request->id)->orderBy('id','ASC')->get();
        return view('admin.comites.index')->with('comite',$comites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_comite_alls= TipoComite::all();
        $tipo_comites = TipoComite::orderBy('name','ASC')->lists('name','id');
        $tipo_comites->prepend('Seleccione un Tipo de Comite','');
        return view('admin.comites.create')->with(['tipo_comite_all'=>$tipo_comite_alls,'tipo_comite'=>$tipo_comites]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComiteRequest $request)
    {
        $comites = new Comite($request->all());
        $comites->name = ucwords($request->name);
        Flash('Comité Registrado Correctamente', 'info');
        $comites->save();
        return redirect()->route('admin.comites.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comites = Comite::findOrFail($id);
        return view('admin.comites.show')->with('comite',$comites);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_comites = TipoComite::orderBy('name','ASC')->lists('name','id');
        $comites = Comite::findOrFail($id);
        return view('admin.comites.edit')->with(['comite'=>$comites,'tipo_comite'=>$tipo_comites]);
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
        $comites = Comite::findOrFail($id);
        $comites->fill($request->all());
        $comites->name = ucwords($request->name);

        $rules = array('name'  => 'unique:comite,name,'.$id);
        $messages = array('name.unique'  =>'Ya existe este Comité');
        $this->validate($request,$rules,$messages);


        Flash('Comité Actualizado Correctamente','info');
        $comites->update();
        return redirect()->route('admin.comites.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comites = Comite::findOrFail($id);
        $comites->delete();
        Flash('Comité Eliminado Correctamente','danger');
        return redirect()->route('admin.comites.index');
    }
}
