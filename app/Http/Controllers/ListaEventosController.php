<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Evento;
use App\Tarea;
use App\Config;
use DB;

class ListaEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventos = Evento::Search($request->id)->whereIn('estatus', ['Pag','Pla','Pro','Org','Eje','Cer'])->orderBy('id','ASC')->get();
        $tareas = Tarea::all();
        return view('planificador.listaeventos.index')->with(['evento'=>$eventos,'tarea'=>$tareas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $eventos = Evento::findOrFail($id);
        $configures = Config::first();

        return view('planificador.listaeventos.show')->with(['evento'=>$eventos,'config'=>$configures]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos = Evento::findOrFail($id);
        return view('planificador.listaeventos.edit')->with('evento',$eventos);
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
        $eventos = Evento::findOrFail($id);
        $eventos->fill($request->all());
        $eventos->update();
        Flash('Evento Actualizado Correctamente','info');
        return redirect()->route('planificador.listaeventos.edit',$id);
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
