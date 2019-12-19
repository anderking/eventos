<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\ClienteHijo;
use DB;
use Carbon\Carbon;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cedula'))
            $clientes = Cliente::Search($request->cedula)->orderBy('id','ASC')->get();
        else
            $clientes = Cliente::Search($request->id)->orderBy('id','ASC')->get();
        
        return view('recepcionista.clientes.index')->with('cliente',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recepcionista.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {

        $clientes = new Cliente($request->all());
        
        $clientes->save();

        /*$fecha_nac_hijo = $request->get('fecha_nac_hijo', []);
        dd($fecha_nac_hijo);

        $array = [];

        foreach ($fecha_nac_hijo as $fecha) {
            $array[] = new ClienteHijo(['fecha_nac_hijo'=>$fecha]);   
        }

        $clientes->hijos()->saveMany($array);*/

        Flash('Cliente Registrado Correctamene', 'info');
        return redirect()->route('recepcionista.clientes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('recepcionista.clientes.show')->with('cliente',$clientes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('recepcionista.clientes.edit')->with('cliente',$clientes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteUpdateRequest $request, $id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->fill($request->all());

        $rules = array('cedula'  => 'unique:cliente,cedula,'.$id);
        $messages = array('cedula.unique'  =>'Ya existe esta cedula');
        $this->validate($request,$rules,$messages);

        $clientes->update();

        /*$fecha_nac_hijo = $request->get('fecha_nac_hijo', []);
        
        $array = [];

        foreach ($fecha_nac_hijo as $key=>$fecha) {
            if($fecha>Carbon::now())
            {
                $key++;
                Flash('La Fecha de Nacimiento del hijo '.$key.' no puede ser mayor que la Fecha Actual','danger');
                return redirect()->route('recepcionista.clientes.edit',$id);
            }
            else
            {
                $array[] = new ClienteHijo(['fecha_nac_hijo'=>$fecha]);
            }
        }
        
        foreach ($clientes->hijos as $hijos) {
            $hijos->delete();
        }

        $clientes->hijos()->saveMany($array);*/

        Flash('Cliente Actualizado Correctamente','info');
        return redirect()->route('recepcionista.clientes.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->delete();
        Flash('Cliente Eliminado Correctamente','danger');
        return redirect()->route('recepcionista.clientes.index');
    }
}
