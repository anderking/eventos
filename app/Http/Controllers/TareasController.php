<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TareaRequest;
use App\Http\Controllers\Controller;
use App\TipoTarea;
use App\Tarea;
use DB;

class TareasController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tareas = Tarea::Search($request->id)->orderBy('id','ASC')->get();
        return view('planificador.tareas.index')->with('tarea',$tareas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_tarea_alls= TipoTarea::all();
        $tipo_tareas = TipoTarea::orderBy('name','ASC')->lists('name','id');
        $tipo_tareas->prepend('Seleccione un Tipo de Tarea','');
        return view('planificador.tareas.create')->with(['tipo_tarea_all'=>$tipo_tarea_alls,'tipo_tarea'=>$tipo_tareas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareaRequest $request)
    {
        $tareas = new Tarea($request->all());
        $tareas->name = ucwords($request->name);
        Flash('Tarea Registrada Correctamente', 'info');
        $tareas->save();
        return redirect()->route('planificador.tareas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas = Tarea::findOrFail($id);
        return view('planificador.tareas.show')->with('tarea',$tareas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_tareas = TipoTarea::orderBy('name','ASC')->lists('name','id');
        $tareas = Tarea::findOrFail($id);
        return view('planificador.tareas.edit')->with(['tarea'=>$tareas,'tipo_tarea'=>$tipo_tareas]);
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
        $tareas = Tarea::findOrFail($id);
        $tareas->fill($request->all());
        $tareas->name = ucwords($request->name);

        $rules = array('name'  => 'unique:tarea,name,'.$id);
        $messages = array('name.unique'  =>'Ya existe esta Tarea');
        $this->validate($request,$rules,$messages);


        Flash('Tarea Actualizada Correctamente','info');
        $tareas->update();
        return redirect()->route('planificador.tareas.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tareas = Tarea::findOrFail($id);
        $tareas->delete();
        Flash('Tarea Eliminada Correctamente','danger');
        return redirect()->route('planificador.tareas.index');
    }
}
