<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ServicioRequest;
use App\Http\Controllers\Controller;
use App\Servicio;
use App\TipoServicio;
use DB;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $servicios = Servicio::Search($request->id)->orderBy('id','ASC')->get();
        $servicios->each(function($servicios){
            $servicios->tipo_servicio;
        });
        return view('admin.servicios.index')->with('servicio',$servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_servicio_alls= TipoServicio::all();
        $tipo_servicios = TipoServicio::orderBy('name','ASC')->lists('name','id');
        $tipo_servicios->prepend('Seleccione un Tipo de Servicio','');
        return view('admin.servicios.create')->with(['tipo_servicio_all'=>$tipo_servicio_alls,'tipo_servicio'=>$tipo_servicios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        $servicios = new Servicio($request->all());
        $servicios->name = ucwords($request->name);
        Flash('Servicio Registrado Correctamente', 'info');
        $servicios->save();
        return redirect()->route('admin.servicios.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicios = Servicio::findOrFail($id);
        return view('admin.servicios.show')->with('servicio',$servicios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_servicios = TipoServicio::orderBy('name','ASC')->lists('name','id');
        $servicios = Servicio::findOrFail($id);
        $servicios->tipo_servicio;
        return view('admin.servicios.edit')->with(['servicio'=>$servicios,'tipo_servicio'=>$tipo_servicios]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioRequest $request, $id)
    {
        $servicios = Servicio::findOrFail($id);
        $servicios->fill($request->all());
        $servicios->name = ucwords($request->name);
        Flash('Servicio Actualizado Correctamente','info');
        $servicios->update();
        return redirect()->route('admin.servicios.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicios = Servicio::findOrFail($id);
        $servicios->delete();
        Flash('Servicio Eliminado Correctamente','danger');
        return redirect()->route('admin.servicios.index');
    }
}
