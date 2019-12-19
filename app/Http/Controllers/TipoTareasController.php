<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TipoTareaRequest;
use App\TipoTarea;
use App\Comite;

class TipoTareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipotareas = TipoTarea::Search($request->id)->orderBy('id','ASC')->get();
        return view('planificador.tipotareas.index')->with('tipotarea',$tipotareas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planificador.tipotareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoTareaRequest $request)
    {
        $tipotareas = new TipoTarea($request->all());
        $tipotareas->name = ucwords($request->name);
        Flash('Tipo de Tarea Registrado Correctamente', 'info');
        $tipotareas->save();
        return redirect()->route('planificador.tipotareas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipotareas = TipoTarea::findOrFail($id);
        return view('planificador.tipotareas.show')->with('tipotarea',$tipotareas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipotareas = TipoTarea::findOrFail($id);
        return view('planificador.tipotareas.edit')->with('tipotarea',$tipotareas);
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
        $tipotareas = TipoTarea::findOrFail($id);
        $tipotareas->fill($request->all());
        $tipotareas->name = ucwords($request->name);

        $rules = array('name'  => 'unique:tipo_tarea,name,'.$id);
        $messages = array('name.unique'  =>'Este Tipo de Tarea ya esta registrado');
        $this->validate($request,$rules,$messages);

        Flash('Tipo de Tarea Actualizado Correctamente','info');
        $tipotareas->update();
        return redirect()->route('planificador.tipotareas.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipotareas = TipoTarea::findOrFail($id);
        $tipotareas->delete();
        Flash('Tipo de Tarea Eliminado Correctamente','danger');
        return redirect()->route('planificador.tipotareas.index');
    }
}
