<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LocalRequest;
use App\Http\Controllers\Controller;
use App\Local;
use App\TipoLocal;
use App\Config;
use DB;

class LocalesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locales = Local::Search($request->id)->orderBy('id','ASC')->get();
        $locales->each(function($locales){
            $locales->tipo_local;
        });
        return view('admin.locales.index')->with('local',$locales);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_local_alls= TipoLocal::all();
        $tipo_locales = TipoLocal::orderBy('name','ASC')->lists('name','id');
        $tipo_locales->prepend('Seleccione un Tipo de Local','');
        $configures = Config::first();
        return view('admin.locales.create')->with(['tipo_local_all'=>$tipo_local_alls,'tipo_local'=>$tipo_locales,'config'=>$configures]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalRequest $request)
    {
        $locales = new Local($request->all());
        $locales->name = ucwords($request->name);        
        Flash('Local Registrado Correctamente', 'info');
        $locales->save();
        return redirect()->route('admin.locales.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locales = Local::findOrFail($id);
        return view('admin.locales.show')->with('local',$locales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_locales = TipoLocal::orderBy('name','ASC')->lists('name','id');
        $locales = Local::findOrFail($id);
        $configures = Config::first();
        $locales->tipo_local;
        return view('admin.locales.edit')->with(['local'=>$locales,'tipo_local'=>$tipo_locales,'config'=>$configures]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocalRequest $request, $id)
    {
        $locales = Local::findOrFail($id);
        $locales->fill($request->all());
        if ($locales->estacionamiento == "No")
            $locales->capacidad_est = 0;
        $locales->name = ucwords($request->name);
        Flash('Local Actualizado Correctamente','info');
        $locales->update();
        return redirect()->route('admin.locales.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locales = Local::findOrFail($id);
        $locales->delete();
        Flash('Local Eliminado Correctamente','danger');
        return redirect()->route('admin.locales.index');
    }
   
 
}
