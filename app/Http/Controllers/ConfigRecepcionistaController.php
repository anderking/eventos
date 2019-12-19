<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ConfigRecep;

class ConfigRecepcionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configrecep = ConfigRecep::first();
        return view('recepcionista.configrecep.index')->with('configrecep',$configrecep);
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
        $configrecep = ConfigRecep::first();
        $config = new ConfigRecep($request->all());

        if($config->indicador_cuota<=0)
        {
            Flash('La cantidad de cuotas debe ser al menos 1', 'danger');
            return redirect()->route('recepcionista.configrecep.index');
        }
        else
        {
            if($configrecep)
            {
                $configrecep->delete();
                $config->save();
            }
            else
            {
                $config->save();
            }     

            Flash('Configuraciones Registradas Correctamene', 'info');
            return redirect()->route('recepcionista.configrecep.index');
        }

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
