<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PagoRequest;
use App\Http\Controllers\Controller;
use App\Pago;
use App\Evento;
use App\Config;
use App\ConfigRecep;
use DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Validation\Validator;
use Carbon\Carbon;


class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(Request $request)
    {
        $configures = Config::first();

        if($request->has('referencia_bancaria'))
            $pagos = Pago::Search($request->referencia_bancaria)->orderBy('id','ASC')->get();
        else
            $pagos = Pago::Search($request->id)->orderBy('id','ASC')->get();
        
        return view('recepcionista.pagos.index')->with(['pago'=>$pagos,'config'=>$configures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::where('estatus','=','Pen')->orderBy('id','ASC')->lists('id','id');
        $eventos->prepend('Seleccione un Evento','');

        return view('recepcionista.pagos.create')->with(['evento'=>$eventos]);
    }

    public function create2($id)
    {
        $eventos = Evento::findOrFail($id);
        $configuresrecep = ConfigRecep::first();

        return view('recepcionista.pagos.create')->with(['evento'=>$eventos,'configrecep'=>$configuresrecep]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pagos = new Pago($request->all());
        $pagos_all = Pago::all();
        $eventos = Evento::findOrFail($pagos->evento_id);

        $fechapago = $pagos->fecha_pago->toDateString();
        $fechaevento = $eventos->fecha_evento->toDateString();
        $fechacreacionevento = $eventos->created_at->toDateString();

        foreach ($pagos_all as $pagosBD)
        {
            if($pagosBD->referencia_bancaria==$pagos->referencia_bancaria)
            {
                Flash('El Numero de Refrencia Bancaria ya esta registrado', 'danger');
                return redirect()->route('recepcionista.pagos.create2',$eventos->id);    
            }
        }

        if ($fechapago>=$fechacreacionevento && $fechapago<=$fechaevento)
        {
            $pagos->save();
            Flash('Pago Registrado Correctamente', 'info');
            return redirect()->route('recepcionista.pagos.create2',$eventos->id);
        }
        else if($fechapago<$fechacreacionevento)
        {
            Flash('La fecha del pago de una cuota no puede ser inferior a la fecha del registro del Evento. Este Evento fue registrado el '.$eventos->created_at->format('l jS \\of F Y h:i:s A').'', 'danger');
            return redirect()->route('recepcionista.pagos.create2',$eventos->id)->withInput();
        }
        else if($fechapago>$fechaevento)
        {
            Flash('La fecha del pago de una cuota no puede ser superior a la fecha del dia del Evento. Este Evento se realizara el '.$eventos->fecha_evento->format('l jS \\of F Y').'', 'danger');
            return redirect()->route('recepcionista.pagos.create2',$eventos->id)->withInput();
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
        $pagos = Pago::findOrFail($id);
        $configures = Config::first();

        return view('recepcionista.pagos.show')->with(['pago'=>$pagos,'config'=>$configures]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagos = Pago::findOrFail($id);
        return view('recepcionista.pagos.edit')->with('pago',$pagos);
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
        $pagos = Pago::findOrFail($id);
        $pagos->fill($request->all());
        $eventos = Evento::findOrFail($pagos->evento_id);

        $fechapago = $pagos->fecha_pago->toDateString();
        $fechaevento = $eventos->fecha_evento->toDateString();
        $fechacreacionevento = $eventos->created_at->toDateString();

        if ($fechapago>=$fechacreacionevento && $fechapago<=$fechaevento)
        {
            $pagos->update();
            
            if($pagos->estatus=="Pag")
            {
                $cant_pagos_pag = 0;

                foreach ($eventos->pagos as $pagos_for)
                {
                    if($pagos_for->estatus=="Pag")
                    {
                        $cant_pagos_pag++;
                    }
                }

                if($cant_pagos_pag==$eventos->nro_cuotas)
                {
                    $eventos->estatus = "Pag";
                    $eventos->update();
                }
                else
                {
                    $eventos->estatus = "Pro";
                    $eventos->update();
                }
            }
            else 
            {
                if($pagos->estatus=="Pen")
                {
                    $cant_pagos_pen = 0;

                    foreach ($eventos->pagos as $pagos_for)
                    {
                        if($pagos_for->estatus=="Pen")
                        {
                            $cant_pagos_pen++;
                        }
                    }

                    if($cant_pagos_pen==count($eventos->pagos))
                    {
                        $eventos->estatus = "Pen";
                        $eventos->update();
                    }
                    else
                    {
                        $eventos->estatus = "Pro";
                        $eventos->update();
                    }
                }
            }

            Flash('Pago Actualizado Correctamente', 'info');
            return redirect()->route('recepcionista.pagos.edit',$id);
        }
        else if($fechapago<$fechacreacionevento)
        {
            Flash('La fecha del pago de una cuota no puede ser inferior a la fecha del registro del Evento. Este Evento fue registrado el '.$eventos->created_at->format('l jS \\of F Y h:i:s A').'', 'danger');
            return redirect()->route('recepcionista.pagos.edit',$id)->withInput();
        }
        else if($fechapago>$fechaevento)
        {
            Flash('La fecha del pago de una cuota no puede ser superior a la fecha del dia del Evento. Este Evento se realizara el '.$eventos->fecha_evento->format('l jS \\of F Y').'', 'danger');
            return redirect()->route('recepcionista.pagos.edit',$id)->withInput();
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
        $pagos = Pago::findOrFail($id);
        
        $eventos = Evento::findOrFail($pagos->evento_id);
        
        $pagos->delete();

        if(count($eventos->pagos)<=0)
        {
            $eventos->estatus = "Pen";
            $eventos->update();
        }
        else
        {
            $eventos->estatus = "Pro";
            $eventos->update();   
        }

        Flash('Pago Eliminado Correctamente','danger');
        return redirect()->route('recepcionista.pagos.index');
    }
}
