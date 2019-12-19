<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventoTareaRequest;
use App\Http\Controllers\Controller;
use App\Evento;
use App\Tarea;
use App\EventoTarea;
use DB;
use Carbon\Carbon;

class EventoTareasController extends Controller
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
        $eventotareas = EventoTarea::Search($request->id)
                    ->orderBy('evento_tarea.id','ASC')
                    ->get();

        //dd($eventotareas);

        return view('planificador.eventotareas.index')->with('eventotarea',$eventotareas);
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

    public function create2($id)
    {
        $eventos = Evento::findOrFail($id);
        $tareas_all = Tarea::all();
        $eventos_all = Evento::all();

        $tareas = Tarea::orderBy('id','ASC')->lists('name','id');
        $tareas->prepend('Seleccione una Tarea','');

        return view('planificador.eventotareas.create')->with(['evento'=>$eventos,'evento_all'=>$eventos_all,'tarea_all'=>$tareas_all,'tarea'=>$tareas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoTareaRequest $request)
    {
        $eventotareas = new EventoTarea($request->all());
        $eventos = Evento::findOrFail($eventotareas->evento_id);

    
        $fechainicio = $eventotareas->fecha_inicio->toDateString();
        $fechafin = $eventotareas->fecha_fin->toDateString();
        $fechacreacionevento = $eventos->created_at->toDateString();
        $fechaevento = $eventos->fecha_evento->toDateString();

        foreach ($eventos->evento_tareas as $key=>$tareas)
        {
            if ($tareas->tarea_id==$eventotareas->tarea_id)
            {
                Flash('El Evento ya tiene esta Tarea asignada', 'danger');
                return redirect()->route('planificador.eventotareas.create2',$eventos->id)->withInput();
            }
        }

        if($fechainicio>=$fechacreacionevento && $fechafin>=$fechacreacionevento && $fechainicio<=$fechaevento && $fechafin<=$fechaevento && $fechainicio<=$fechafin)
        {
            Flash('Tarea Asignada Correctamente', 'info');
            $eventotareas->save();
            return redirect()->route('planificador.eventotareas.create2',$eventos->id);
        }
        elseif($fechainicio<$fechacreacionevento || $fechafin<$fechacreacionevento)
        {
            Flash('Las fechas no pueden ser inferiores a la fecha del registro del Evento. Este Evento fue registrado el '.$eventos->created_at->format('l jS \\of F Y h:i:s A').'', 'danger');
            return redirect()->route('planificador.eventotareas.create2',$eventos->id)->withInput();
        }
        elseif($fechainicio>$fechaevento || $fechafin>$fechaevento)
        {
            Flash('Las fechas no pueden ser superiores a la fecha del dia del Evento. Este Evento se realizara el '.$eventos->fecha_evento->format('l jS \\of F Y h:i:s A').'', 'danger');
            return redirect()->route('planificador.eventotareas.create2',$eventos->id)->withInput();
        }
        elseif($fechainicio>$fechafin)
        {
            Flash('La fecha de inicio no puede ser mayor que la fecha fin', 'danger');
            return redirect()->route('planificador.eventotareas.create2',$eventos->id)->withInput();
        }
        else{
            Flash('Las Fechas no son correctas verifique por favor', 'danger');
            return redirect()->route('planificador.eventotareas.create2',$eventos->id)->withInput();   
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
        $eventotareas = EventoTarea::findOrFail($id);
        return view('planificador.eventotareas.show')->with('eventotarea',$eventotareas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventotareas = EventoTarea::findOrFail($id);
        
        $tareas = Tarea::orderBy('id','ASC')->lists('name','id');
        
        return view('planificador.eventotareas.edit')->with(['eventotarea'=>$eventotareas,'tarea'=>$tareas]);
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
        $eventotareas = EventoTarea::findOrFail($id);
        $eventotareas->fill($request->all());
        

        $eventos = Evento::findOrFail($eventotareas->evento_id);

        /*foreach ($eventos->evento_tareas as $key=>$tareas)
        {
                if ($tareas->tarea_id==$eventotareas->tarea_id)
                {
                    Flash('El Evento ya tiene esta Tarea asignada', 'danger');
                    return redirect()->route('planificador.eventotareas.edit',$id);
                }
        }*/
    
        $fechainicio = $eventotareas->fecha_inicio->toDateString();
        $fechafin = $eventotareas->fecha_fin->toDateString();
        $fechacreacionevento = $eventos->created_at->toDateString();
        $fechaevento = $eventos->fecha_evento->toDateString();

        if($fechainicio>=$fechacreacionevento && $fechafin>=$fechacreacionevento && $fechainicio<=$fechaevento && $fechafin<=$fechaevento && $fechainicio<=$fechafin)
        {
            Flash('Tarea Actualizada Correctamente', 'info');
            $eventotareas->update();
            return redirect()->route('planificador.eventotareas.edit',$id);
        }
        elseif($fechainicio<$fechacreacionevento || $fechafin<$fechacreacionevento)
        {
            Flash('Las fechas no pueden ser inferiores a la fecha del registro del Evento. Este Evento fue registrado el '.$eventos->created_at->format('l jS \\of F Y h:i:s A').'', 'danger');
            return redirect()->route('planificador.eventotareas.edit',$id)->withInput();
        }
        elseif($fechainicio>$fechaevento || $fechafin>$fechaevento)
        {
            Flash('Las fechas no pueden ser superiores a la fecha del dia del Evento. Este Evento se realizara el '.$eventos->fecha_evento->format('l jS \\of F Y h:i:s A').'', 'danger');
            return redirect()->route('planificador.eventotareas.edit',$id)->withInput();
        }
        elseif($fechainicio>$fechafin)
        {
            Flash('La fecha de inicio no puede ser mayor que la fecha fin', 'danger');
            return redirect()->route('planificador.eventotareas.edit',$id)->withInput();
        }
        else{
            Flash('Las Fechas no son correctas verifique por favor', 'danger');
            return redirect()->route('planificador.eventotareas.edit',$id)->withInput();   
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
        $eventotareas = EventoTarea::findOrFail($id);
        $eventotareas->delete();

        $referer = request()->headers->get('referer');
        $parts = explode('/public/', $referer);
        $path_array = array_slice($parts,1);
        $path = implode('/',$path_array);

        $idt = $eventotareas->evento->id;

        if ($path == 'planificador/eventotareas/'.$idt.'/create')
        {
            return redirect()->route('planificador.eventotareas.create2',$idt);
        }
        else
        {
            Flash('Tarea Eliminada Correctamente','danger');
            return redirect()->route('planificador.eventotareas.index');
        }

    }
}
