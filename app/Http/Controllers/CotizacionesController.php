<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use App\Http\Requests;
use App\Http\Requests\CotizacionRequest;
use App\Http\Controllers\Controller;
use App\Cotizacion;
use App\Costo;
use App\Local;
use App\Cliente;
use App\CotizacionCosto;
use App\Config;
use DB;

class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('id'))
            $cotizaciones = Cotizacion::Search($request->id)->orderBy('id','ASC')->get();
        else
            $cotizaciones = Cotizacion::orderBy('id','ASC')->get();
        
        $configures = Config::first();

        return view('recepcionista.cotizaciones.index')->with(['cotizacion'=>$cotizaciones,'config'=>$configures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes_all= Cliente::all();
        $costos = Costo::all();
        $locales = Local::all();
        $configures = Config::first();
        
        $clientes = Cliente::orderBy('name','ASC')->lists('cedula','id');
        $clientes->prepend('Seleccione un Cliente','');

        $costos->each(function($costos){
            $costos->item;
            $costos->proveedor;
        });
        $locales_list = Local::orderBy('name','ASC')->lists('name','id');
        $locales_list->prepend('Seleccione un Local','');


        return view('recepcionista.cotizaciones.create')->with(['cliente_all'=>$clientes_all,'costo'=>$costos,'local'=>$locales,'cliente'=>$clientes,'config'=>$configures,'local_list'=>$locales_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizaciones = new Cotizacion($request->all());
        $local_request = Local::find($cotizaciones->local_id);
        $cantidad = $request->get('cantidad', []);
        $costo = $request->get('costo', []);
        $costos_request = Costo::whereIn('id',$costo)->get();
        $cantidad_collection = Collection::make($cantidad);
        
        $monto_venta = 0.00;
        $monto_iva = 0.00;
        $local_venta = 0.00;
        $local_iva = 0.00;

        $local_venta = $local_request->precio_venta;
        $local_iva = $local_request->IVA;
        
        for ($i=0; $i < count($costos_request) ; $i++) { 
            $monto_venta += $costos_request[$i]->precio_venta*$cantidad_collection[$i];
            $monto_iva += $costos_request[$i]->IVA;
        }

        $cotizaciones->monto_total_venta = number_format($monto_venta + $local_venta, 2, '.', '');
        $cotizaciones->monto_total_iva = number_format($monto_iva + $local_iva, 2, '.', '');
        $cotizaciones->monto_presupuesto = number_format($monto_venta + $local_venta + $monto_iva + $local_iva, 2, '.', '');
         
        if ($cotizaciones->cliente_id=="")
        {
            Flash('Eliga un Cliente ', 'danger');
            return redirect()->route('recepcionista.cotizaciones.create');
        }
        else
        {
            $cotizaciones->save();
            $array = [];
            $tamaño = count($costo);

            for ($i=0; $i < $tamaño; $i++) { 
                
                $array[$costo[$i]] = [ 'cantidad' => $cantidad[$i] ];
            }
            $cotizaciones->costos()->sync($array);

            /*$cotizacion_costo_all = CotizacionCosto::all();
            $ultimos = $cotizacion_costo_all->count()-count($costos_request);
            $cotizacion_costo_update = CotizacionCosto::take($cotizacion_costo_all->count())->skip($ultimos)->get();
            
            for ($i=0; $i < count($cotizacion_costo_update) ; $i++)
            {
                DB::table('cotizacion_costo')
                ->where('id', $cotizacion_costo_update[$i]->id)
                ->update(['cantidad' => $cantidad_collection[$i]]);
            }
            */
            Flash('Cotización Registrada Correctamene ', 'info');
            return redirect()->route('recepcionista.cotizaciones.create');
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
        $cotizaciones = Cotizacion::findOrFail($id);
        $configures = Config::first();

        $totalventas = 0;
        $totalivas = 0;
        $totalcantidades = 0;
        $totalfinalventas=0;
        $totalfinalivas=0;
        
        foreach ($cotizaciones->costos as $cotizacion_costo) {
            $totalventas += $cotizacion_costo->precio_venta*$cotizacion_costo->pivot->cantidad;
            $totalivas += $cotizacion_costo->IVA;
            $totalcantidades += $cotizacion_costo->pivot->cantidad;
        }

        $totalfinalventas = $totalventas + $cotizaciones->local->precio_venta;
        $totalfinalivas = $totalivas + $cotizaciones->local->IVA;

        return view('recepcionista.cotizaciones.show')->with(['cotizacion'=>$cotizaciones,'config'=>$configures,'totalventa'=>$totalventas,'totaliva'=>$totalivas,'totalcantidad'=>$totalcantidades,'totalfinalventa'=>$totalfinalventas,'totalfinaliva'=>$totalfinalivas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizaciones = Cotizacion::findOrFail($id);

        $costos = Costo::all();
        $locales = Local::all();
        $configures = Config::first();


        return view('recepcionista.cotizaciones.edit')->with(['cotizacion'=>$cotizaciones,'costo'=>$costos,'local'=>$locales,'config'=>$configures]);
        
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
        $cotizaciones = Cotizacion::findOrFail($id);
        
        $monto_total_venta = $cotizaciones->monto_total_venta;
        $monto_total_iva = $cotizaciones->monto_total_iva;

        $cotizaciones->fill($request->all());
        $local_request = Local::find($cotizaciones->local_id);
        $cantidad = $request->get('cantidad', []);
        $costo = $request->get('costo', []);
        $costos_request = Costo::whereIn('id',$costo)->get();
        $cantidad_collection = Collection::make($cantidad);
        
        if(sizeof($costo)>0)
        {
            $monto_venta = 0.00;
            $monto_iva = 0.00;
            $local_venta = 0.00;
            $local_iva = 0.00;

            $local_venta = $local_request->precio_venta;
            $local_iva = $local_request->IVA;
            
            for ($i=0; $i < count($costos_request) ; $i++) { 
                $monto_venta += $costos_request[$i]->precio_venta*$cantidad_collection[$i];
                $monto_iva += $costos_request[$i]->IVA;
            }

            $cotizaciones->monto_total_venta = number_format($monto_venta + $local_venta, 2, '.', '');
            $cotizaciones->monto_total_iva = number_format($monto_iva + $local_iva, 2, '.', '');
            $cotizaciones->monto_presupuesto = number_format($monto_venta + $local_venta + $monto_iva + $local_iva, 2, '.', '');
        }
        
        $cotizaciones->monto_total_venta = $monto_total_venta;
        $cotizaciones->monto_total_iva = $monto_total_iva;

        $cotizaciones->update();
        
        $array = [];
        $tamaño = count($costo);

        for ($i=0; $i < $tamaño; $i++)
        {         
            $array[$costo[$i]] = [ 'cantidad' => $cantidad[$i] ];
        }

        if(sizeof($costo)>0)
        {
            $cotizaciones->costos()->sync($array);
        }


        Flash('Cotización Actualizada Correctamente','info');
        return redirect()->route('recepcionista.cotizaciones.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cotizaciones = Cotizacion::findOrFail($id);
        $cotizaciones->delete();
        Flash('Cotizacion Eliminada Correctamente','danger');
        return redirect()->route('recepcionista.cotizaciones.index');
    }
}
