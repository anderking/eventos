<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EventoRequest;
use App\Http\Controllers\Controller;
use App\Evento;
use App\TipoEvento;
use App\Cotizacion;
use App\Cliente;
use App\Config;
use App\ConfigRecep;
use DB;


class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventos = Evento::Search($request->id)->orderBy('id','ASC')->get();
        $configures = Config::first();
        $configuresrecep = ConfigRecep::first();

        return view('recepcionista.eventos.index')->with(['evento'=>$eventos,'config'=>$configures,'configrecep'=>$configuresrecep]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_eventos_all= TipoEvento::all();
        $cotizaciones_all= Cotizacion::where('estatus','=','C')->get();
        $clientes_all= Cliente::all();
        $configuresrecep = ConfigRecep::first();

    
        $tipo_eventos = TipoEvento::orderBy('id','ASC')->lists('name','id');
        $tipo_eventos->prepend('Seleccione un Tipo de Evento','');

        $cotizaciones = Cotizacion::where('estatus','=','C')->orderBy('id','ASC')->lists('descripcion','id');
        $cotizaciones->prepend('Seleccione una Cotización','');

        $clientes = Cliente::orderBy('cedula','ASC')->lists('cedula','id');
        $clientes->prepend('Seleccione un Cliente','');

        return view('recepcionista.eventos.create')->with(['tipo_evento_all'=>$tipo_eventos_all,'cotizacion_all'=>$cotizaciones_all,'cliente_all'=>$clientes_all,'tipo_evento'=>$tipo_eventos,'cotizacion'=>$cotizaciones,'cliente'=>$clientes,'configrecep'=>$configuresrecep]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(EventoRequest $request)
    {
        $eventos = Evento::all();

        $eventos_request = new Evento($request->all());
        $horainicio = $eventos_request->hora_inicio;
        $horafin = $eventos_request->hora_fin;
        if($horainicio>=$horafin)
        {
            Flash('La hora de inicio no puede ser mayor o igual que la hora fin', 'danger');
            return redirect()->route('recepcionista.eventos.create')->withInput();
        }

        foreach ($eventos as $evento)
        {

            if ($evento->cotizacion_id == $eventos_request->cotizacion_id)
            {
                Flash('Esta Cotización ya tiene un evento asginado', 'danger');
                return redirect()->route('recepcionista.eventos.create')->withInput();
            }
            else
            {
                if ( ($evento->cotizacion->local->id == $eventos_request->cotizacion->local->id) && ($evento->fecha_evento == $eventos_request->fecha_evento) )
                {
                    Flash('Ya existe un evento a realizar en esta fecha en el mismo lugar', 'danger');
                    return redirect()->route('recepcionista.eventos.create')->withInput();
                }
            }
        }
        $eventos_request->save();
        $cotizacionunica = Cotizacion::findOrFail($eventos_request->cotizacion_id);
        $cotizacionunica->estatus = "A";
        $cotizacionunica->update();
        Flash('Evento Registrado Correctamente', 'info');
        return redirect()->route('recepcionista.eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos = Evento::findOrFail($id);
        $configures = Config::first();

        return view('recepcionista.eventos.show')->with(['evento'=>$eventos,'config'=>$configures]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos = Evento::findOrFail($id);
        $configuresrecep = ConfigRecep::first();

        return view('recepcionista.eventos.edit')->with(['evento'=>$eventos,'configrecep'=>$configuresrecep]);
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
        $eventos = Evento::all()->except($id);
        $eventos_request = Evento::findOrFail($id);
        $eventos_request->fill($request->all());

        $rules =
        array(
                'fecha_evento'  =>  'required|date|date_format:Y-m-d|after:today',
                'hora_inicio'       =>  'required',
                'hora_fin'          =>  'required',
            );
        $this->validate($request,$rules);

        $horainicio = $eventos_request->hora_inicio;
        $horafin = $eventos_request->hora_fin;
        
        
        if($horainicio>=$horafin)
        {
            Flash('La hora de inicio no puede ser mayor o igual que la hora fin', 'danger');
                return redirect()->route('recepcionista.eventos.edit',$id)->withInput();
        }
        else
        {
            foreach ($eventos as $evento)
            {
                if ( $evento->fecha_evento == $eventos_request->fecha_evento ) 
                {
                    Flash('Ya existe un evento a realizar en esta fecha en el mismo lugar', 'danger');
                    return redirect()->route('recepcionista.eventos.edit',$id)->withInput();
                }
            }

            Flash('Evento Actualizado Correctamente','info');
            $eventos_request->update();
            return redirect()->route('recepcionista.eventos.edit',$id);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventos = Evento::findOrFail($id);
        
        $cotizacionunica = Cotizacion::findOrFail($eventos->cotizacion_id);
        $cotizacionunica->estatus = "C";
        $cotizacionunica->update();

        $eventos->delete();

        Flash('Evento Eliminado Correctamente','danger');
        return redirect()->route('recepcionista.eventos.index');
    }
}
