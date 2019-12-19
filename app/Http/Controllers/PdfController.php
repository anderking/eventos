<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Evento;
use App\Cotizacion;
use App\Config;
use App\ConfigRecep;
use Carbon\Carbon;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice($id) 
    {
        $data = $this->getData($id);
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('recepcionista.pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getData($id) 
    {
        $evento = Evento::findOrFail($id);
        $configures = Config::first();
        $configuresrecep = ConfigRecep::first();
        $date = Carbon::now()->format('l jS \\of F Y h:i A');
        
        $totalpagos=0.00;

        foreach ($evento->pagos as $pagos)
        {
            $totalpagos = $totalpagos + $pagos->importe;
        }

        $data =  [
            'moneda'                =>  $configures->moneda,
            'porc_cuota'            =>  $configuresrecep->porc_cuota,
            'totalpagos'            =>  $totalpagos,
            'date'                  =>  $date,
            'id'                    =>  $id,
            'fecha_evento'          =>  $evento->fecha_evento,
            'hora_inicio'           =>  $evento->hora_inicio,
            'hora_fin'              =>  $evento->hora_fin,
            'tipo'                  =>  $evento->tipo_evento->name,
            'cotizacion'            =>  $evento->cotizacion->id,
            'cedula'                =>  $evento->cotizacion->cliente->cedula,
            'nombres'               =>  $evento->cotizacion->cliente->name,
            'apellidos'             =>  $evento->cotizacion->cliente->apellido,
            'descripcion'           =>  $evento->cotizacion->descripcion,
            'nro_invitados'         =>  $evento->cotizacion->nro_invitados,
            'lugar'                 =>  $evento->cotizacion->local,
            'lugar_nombre'          =>  $evento->cotizacion->local->name,
            'direccion'             =>  $evento->cotizacion->local->direccion,
            'cant_pagos'            =>  count($evento->pagos),
            'pagos'                 =>  $evento->pagos,
            'cant_servicios'        =>  count($evento->cotizacion->costos)+1,
            'costos'                =>  $evento->cotizacion->costos,
            'monto_total_venta'     =>  $evento->cotizacion->monto_total_venta,
            'monto_total_iva'       =>  $evento->cotizacion->monto_total_iva,
            'monto_presupuesto'     =>  $evento->cotizacion->monto_presupuesto,
            'nro_cuotas'            =>  $evento->nro_cuotas,
        ];
        return $data;
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
        //
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
