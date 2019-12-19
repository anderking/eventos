<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TipoLocalRequest;
use App\TipoLocal;
use App\Local;

class TipoLocalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipolocales = TipoLocal::Search($request->id)->orderBy('id','ASC')->get();
        return view('admin.tipolocales.index')->with('tipolocal',$tipolocales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipolocales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoLocalRequest $request)
    {
        $tipolocales = new TipoLocal($request->all());
        $tipolocales->name = ucwords($request->name);
        Flash('Tipo de Servicio Registrado Correctamente', 'info');
        $tipolocales->save();
        return redirect()->route('admin.tipolocales.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipolocales = TipoLocal::findOrFail($id);
        return view('admin.tipolocales.show')->with('tipolocal',$tipolocales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipolocales = TipoLocal::findOrFail($id);
        return view('admin.tipolocales.edit')->with('tipolocal',$tipolocales);
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
        $tipolocales = TipoLocal::findOrFail($id);
        $tipolocales->fill($request->all());
        $tipolocales->name = ucwords($request->name);

        $rules = array('name'  => 'unique:tipo_local,name,'.$id);
        $messages = array('name.unique'  =>'Ya existe este Tipo de Local');
        $this->validate($request,$rules,$messages);

        Flash('Tipo de Servicio Actualizado Correctamente','info');
        $tipolocales->update();
        return redirect()->route('admin.tipolocales.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipolocales = TipoLocal::findOrFail($id);
        $tipolocales->delete();
        Flash('Tipo de Servicio Eliminado Correctamente','danger');
        return redirect()->route('admin.tipolocales.index');
    }
}
