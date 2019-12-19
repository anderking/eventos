<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TipoComiteRequest;
use App\TipoComite;
use App\Comite;

class TipoComitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipocomites = TipoComite::Search($request->id)->orderBy('id','ASC')->get();
        return view('admin.tipocomites.index')->with('tipocomite',$tipocomites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipocomites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoComiteRequest $request)
    {
        $tipocomites = new TipoComite($request->all());
        $tipocomites->name = ucwords($request->name);
        Flash('Tipo de Comité Registrado Correctamente', 'info');
        $tipocomites->save();
        return redirect()->route('admin.tipocomites.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipocomites = TipoComite::findOrFail($id);
        return view('admin.tipocomites.show')->with('tipocomite',$tipocomites);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipocomites = TipoComite::findOrFail($id);
        return view('admin.tipocomites.edit')->with('tipocomite',$tipocomites);
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
        $tipocomites = TipoComite::findOrFail($id);
        $tipocomites->fill($request->all());
        $tipocomites->name = ucwords($request->name);

        $rules = array('name'  => 'unique:tipo_comite,name,'.$id);
        $messages = array('name.unique'  =>'Este Tipo de Comité ya esta registrado');
        $this->validate($request,$rules,$messages);

        Flash('Tipo de Comité Actualizado Correctamente','info');
        $tipocomites->update();
        return redirect()->route('admin.tipocomites.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipocomites = TipoComite::findOrFail($id);
        $tipocomites->delete();
        Flash('Tipo de Comité Eliminado Correctamente','danger');
        return redirect()->route('admin.tipocomites.index');
    }
}
