<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EventoTarea;
use App\Evento;
use App\Tarea;
use DB;

class ListaTareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventotareas = EventoTarea::Search($request->id)->orderBy('id','ASC')->get();
        return view('coordinador.listatareas.index')->with('eventotarea',$eventotareas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventotareas = EventoTarea::findOrFail($id);
        return view('coordinador.listatareas.show')->with('eventotarea',$eventotareas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventotareas = EventoTarea::findOrFail($id);
        return view('coordinador.listatareas.edit')->with('eventotarea',$eventotareas);
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
        $eventotareas = EventoTarea::findOrFail($id);
        $eventotareas->fill($request->all());
        $eventotareas->update();
        Flash('Tarea del Evento Actualizada Correctamente','info');
        return redirect()->route('coordinador.listatareas.edit',$id);
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
