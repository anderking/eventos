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

class PdfCotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $data = $this->getData($id);
        $cotizacion = Cotizacion::findOrFail($id);
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('recepcionista.pdf.cotizacion', compact('data', 'date', 'cotizacion'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('cotizacion');
    }

    public function getData($id) 
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $configures = Config::first();
        $configuresrecep = ConfigRecep::first();
        $date = Carbon::now()->format('l jS \\of F Y h:i A');
        
        $totalpagos=0.00;

        $data =  [
            'moneda'                =>  $configures->moneda,
            'date'                  =>  $date,
            'id'                    =>  $id,
            'fecha_registro'        =>  $cotizacion->created_at,
            'cedula'                =>  $cotizacion->cliente->cedula,
            'nombres'               =>  $cotizacion->cliente->name,
            'apellidos'             =>  $cotizacion->cliente->apellido,
            'descripcion'           =>  $cotizacion->descripcion,
            'nro_invitados'         =>  $cotizacion->nro_invitados,
            'lugar'                 =>  $cotizacion->local,
            'lugar_nombre'          =>  $cotizacion->local->name,
            'direccion'             =>  $cotizacion->local->direccion,
            'cant_servicios'        =>  count($cotizacion->costos)+1,
            'costos'                =>  $cotizacion->costos,
            'monto_total_venta'     =>  $cotizacion->monto_total_venta,
            'monto_total_iva'       =>  $cotizacion->monto_total_iva,
            'monto_presupuesto'     =>  $cotizacion->monto_presupuesto,
        ];
        return $data;
    }

    public function index()
    {
        //
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
