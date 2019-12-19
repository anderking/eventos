<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CostoRequest;
use App\Http\Controllers\Controller;
use App\Item;
use App\Proveedor;
use App\Costo;
use App\Config;
use DB;

class CostosController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $configures = Config::first();
        $costos = Costo::Search($request->id)->orderBy('id','ASC')->get();
        return view('admin.costos.index')->with(['costo'=>$costos,'config'=>$configures]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item_alls= Item::all();
        $proveedor_alls= Proveedor::all();
        $configures = Config::first();

        $items = Item::orderBy('id','ASC')->lists('descripcion','id');
        $items->prepend('Seleccione un Item','');
        $proveedores = Proveedor::orderBy('id','ASC')->lists('razon_social','id');
        $proveedores->prepend('Seleccione un Proveedor','');
        
        return view('admin.costos.create')->with(['item_all'=>$item_alls,'proveedor_all'=>$proveedor_alls,'config'=>$configures,'item'=>$items,'proveedor'=>$proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostoRequest $request)
    {
        $costos = Costo::all();
        $costos_request = new Costo($request->all());
        $id_item = $request->item_id;
        $id_proveedor = $request->proveedor_id;
        foreach ($costos as $ocosto)
        {
            if ($ocosto->item_id==$id_item && $ocosto->proveedor_id==$id_proveedor)
            {
                Flash('Ya se registro este costo', 'danger');
                return redirect()->route('admin.costos.create')->withInput();
            }
        }
        $costos_request->save();
        Flash('Costo Registrado Correctamente', 'info');
        return redirect()->route('admin.costos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configures = Config::first();
        $costos = Costo::findOrFail($id);
        
        return view('admin.costos.show')->with(['costo'=>$costos,'config'=>$configures]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costos = Costo::findOrFail($id);
        $configures = Config::first();
        $items = Item::orderBy('id','ASC')->lists('descripcion','id');
        $proveedores = Proveedor::orderBy('id','ASC')->lists('razon_social','id');
        return view('admin.costos.edit')->with(['costo'=>$costos,'config'=>$configures,'item'=>$items,'proveedor'=>$proveedores]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CostoRequest $request, $id)
    {
        $costos = Costo::all()->except($id);
        $costos_request = Costo::findOrFail($id);
        $costos_request->fill($request->all());
        $id_item = $request->item_id;
        $id_proveedor = $request->proveedor_id;

        foreach ($costos as $ocosto){
            if ($ocosto->item_id==$id_item && $ocosto->proveedor_id==$id_proveedor)
            {
                Flash('Ya se registro este costo', 'danger');
                return redirect()->route('admin.costos.edit',$id);
            }
        }

        $costos_request->update();
        Flash('Costo Actualizado Correctamente','info');
        return redirect()->route('admin.costos.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costos = Costo::findOrFail($id);
        $costos->delete();
        Flash('Costo Eliminado Correctamente','danger');
        return redirect()->route('admin.costos.index');
    }
}
