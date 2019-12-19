<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Config;
use App\Costo;

class ConfigAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::first();
        //dd($config);
        return view('admin.config.index')->with('config',$config);
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
        $configs = Config::first();
        $costos = Costo::all();
        $config = new Config($request->all());

        if($configs)
        {
            $configs->delete();
            $config->save();
        }
        else
        {
            $config->save();
        }

        foreach ($costos as $costo) 
        {
            $costo->IVA = $costo->precio_compra*$config->porc_iva;
            $costo->precio_venta = $costo->precio_compra+$costo->IVA+$costo->precio_compra*$config->margen_ganancia;
            $costo->update();
        }
       
        

        Flash('Configuraciones Registradas Correctamene', 'info');
        return redirect()->route('admin.config.index');
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
