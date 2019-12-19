<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TipoServicioRequest;
use App\Http\Controllers\Controller;
use App\TipoServicio;
use App\Servicio;

class TipoServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposervicios = TipoServicio::Search($request->id)->orderBy('id','ASC')->get();
        return view('admin.tiposervicios.index')->with('tiposervicio',$tiposervicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiposervicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoServicioRequest $request)
    {
        $tiposervicios = new TipoServicio($request->all());
        $tiposervicios->name = ucwords($request->name);
        Flash('Tipo de Servicio Registrado Correctamente', 'info');
        $tiposervicios->save();
        return redirect()->route('admin.tiposervicios.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposervicios = TipoServicio::findOrFail($id);
        return view('admin.tiposervicios.show')->with('tiposervicio',$tiposervicios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposervicios = TipoServicio::findOrFail($id);
        return view('admin.tiposervicios.edit')->with('tiposervicio',$tiposervicios);
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
        $tiposervicios = TipoServicio::findOrFail($id);
        $tiposervicios->fill($request->all());
        $tiposervicios->name = ucwords($request->name);

        $rules = array('name'  => 'unique:tipo_servicio,name,'.$id);
        $messages = array('name.unique'  =>'Este servicio ya esta registrado');
        $this->validate($request,$rules,$messages);

        Flash('Tipo de Servicio Actualizado Correctamente','info');
        $tiposervicios->update();
        return redirect()->route('admin.tiposervicios.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiposervicios = TipoServicio::findOrFail($id);
        $tiposervicios->delete();
        Flash('Tipo de Servicio Eliminado Correctamente','danger');
        return redirect()->route('admin.tiposervicios.index');
    }
}
