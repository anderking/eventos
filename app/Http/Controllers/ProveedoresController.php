<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProveedorRequest;
use App\Http\Requests\ProveedorUpdateRequest;
use App\Http\Controllers\Controller;
use App\Proveedor;
use DB;

class ProveedoresController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('rif'))
            $proveedores = Proveedor::Search($request->rif)->orderBy('id','ASC')->get();
        else
            $proveedores = Proveedor::Search($request->id)->orderBy('id','ASC')->get();

        $proveedores->each(function($proveedores){
            $proveedores->rol;
        });
        return view('admin.proveedores.index')->with('proveedor',$proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        $proveedores = new Proveedor($request->all());
        Flash('Proveedor Registrado Correctamente', 'info');
        $proveedores->save();
        return redirect()->route('admin.proveedores.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedores = Proveedor::findOrFail($id);
        return view('admin.proveedores.show')->with('proveedor',$proveedores);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedores = Proveedor::findOrFail($id);
        return view('admin.proveedores.edit')->with('proveedor',$proveedores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorUpdateRequest $request, $id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->fill($request->all());
    
        $rules = array(
                        'rif'           => 'unique:proveedor,rif,'.$id,
                        );
        $messages = array(
                        'rif.unique'            =>'El Rif ya está registrado en la base de datos',
                        );

        $this->validate($request,$rules,$messages); 

        Flash('Proveedor Actualizado Correctamente','info');
        $proveedores->update();
        return redirect()->route('admin.proveedores.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->delete();
        Flash('Proveedor Eliminado Correctamente','danger');
        return redirect()->route('admin.proveedores.index');
    }
}
