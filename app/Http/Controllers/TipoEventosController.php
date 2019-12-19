<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TipoEventoRequest;
use App\Http\Controllers\Controller;
use App\TipoEvento;
use DB;

class TipoEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipoeventos = TipoEvento::Search($request->id)->orderBy('id','ASC')->get();
        return view('admin.tipoeventos.index')->with('tipoevento',$tipoeventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipoeventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoEventoRequest $request)
    {
        $tipoeventos = new TipoEvento($request->all());
        $tipoeventos->name = ucwords($request->name);
        Flash('Tipo de Evento Registrado Correctamente', 'info');
        $tipoeventos->save();
        return redirect()->route('admin.tipoeventos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoeventos = TipoEvento::findOrFail($id);
        return view('admin.tipoeventos.show')->with('tipoevento',$tipoeventos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoeventos = TipoEvento::findOrFail($id);
        return view('admin.tipoeventos.edit')->with('tipoevento',$tipoeventos);

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
        $tipoeventos = TipoEvento::findOrFail($id);
        $tipoeventos->fill($request->all());
        $tipoeventos->name = ucwords($request->name);

        $rules = array('name'  => 'unique:tipo_evento,name,'.$id);
        $messages = array('name.unique'  =>'Ya existe este Tipo de Evento');
        $this->validate($request,$rules,$messages);


        Flash('Tipo de Evento Actualizado Correctamente','info');
        $tipoeventos->update();
        return redirect()->route('admin.tipoeventos.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoeventos = TipoEvento::findOrFail($id);
        $tipoeventos->delete();
        Flash('Tipo Evento Eliminado Correctamente','danger');
        return redirect()->route('admin.tipoeventos.index');
    }
}
