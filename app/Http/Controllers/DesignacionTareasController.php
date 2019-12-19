<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DesignacionTareaRequest;
use App\Http\Controllers\Controller;
use App\DesignacionComite;
use App\DesignacionTarea;
use App\User;
use App\EventoTarea;
use App\Comite;
use DB;

class DesignacionTareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $designaciontareas = DesignacionTarea::Search($request->id)->orderBy('id','ASC')->get();
        return view('coordinador.designaciontareas.index')->with('designaciontarea',$designaciontareas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function create2($id)
    {
        $eventotareas = EventoTarea::findOrFail($id);
        $comites_all = Comite::all();
        $comites = Comite::orderBy('id','ASC')->lists('name','id');
        $comites->prepend('Seleccione un Comité','');

        return view('coordinador.designaciontareas.create')->with(['comite'=>$comites,'comite_all'=>$comites_all,'eventotarea'=>$eventotareas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $designaciontareas = new DesignacionTarea($request->all());
        $eventotareas = EventoTarea::findOrFail($designaciontareas->evento_tarea_id);
        //$designaciontareas->save();
        Flash('Designacion Realizada Correctamente', 'info');
        return redirect()->route('coordinador.designaciontareas.create2',$eventotareas->id);
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
        //
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
