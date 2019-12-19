<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Item;
use App\Servicio;
use DB;

class ItemsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::Search($request->id)->orderBy('id','ASC')->get();
        $items->each(function($items){
            $items->servicio;

        });

        return view('admin.items.index')->with('item',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios_all= Servicio::all();
        $servicios = Servicio::orderBy('name','ASC')->lists('name','id');
        $servicios->prepend('Seleccione un Servicio','');
        return view('admin.items.create')->with(['servicio_all'=>$servicios_all,'servicio'=>$servicios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $items = new Item($request->all());
        Flash('Item Registrado Correctamente', 'info');
        $items->save();
        return redirect()->route('admin.items.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::findOrFail($id);
        return view('admin.items.show')->with('item',$items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicios = Servicio::orderBy('name','ASC')->lists('name','id');
        $items = Item::findOrFail($id);
        $items->servicio;
        return view('admin.items.edit')->with(['item'=>$items,'servicio'=>$servicios]);
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
        $items = Item::findOrFail($id);
        $items->fill($request->all());
        Flash('Item Actualizado Correctamente','info');
        $items->update();
        return redirect()->route('admin.items.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();
        Flash('Item Eliminado Correctamente','danger');
        return redirect()->route('admin.items.index');
    }
}
