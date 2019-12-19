@extends ('admin.template.main')

@section('title','Recepcionista-Evento-Show')
@section('body_class','recepcionista_eventos_show')
@section('main_class','recepcionista_eventos_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Evento {{ $evento->cotizacion->descripcion }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $evento->cotizacion->descripcion }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					@if($evento->id<=9)
					<li class="list-group-item"><b>ID: </b>E00{{ $evento->id }}</li>
					@elseif($evento->id>9 and $evento->id<=99)
					<li class="list-group-item"><b>ID: </b>E0{{ $evento->id }}</li>
					@endif
					@if($evento->cotizacion->id<=9)
					<li class="list-group-item"><b>Cotizacion: </b><a href="{{ route('recepcionista.cotizaciones.show',$evento->cotizacion->id) }}">CZ00{{ $evento->cotizacion->id }}</a></li>
					@elseif($evento->cotizacion->id>9 and $evento->cotizacion->id<=99)
					<li class="list-group-item"><b>Cotizacion: </b><a href="{{ route('recepcionista.cotizaciones.show',$evento->cotizacion->id) }}">CZ0{{ $evento->cotizacion->id }}</a></li>
					@endif
					<li class="list-group-item"><b>Tipo Evento: </b>{{ $evento->tipo_evento->name }}</li>
					<li class="list-group-item"><b>Cliente: </b><a href="{{ route('recepcionista.clientes.show',$evento->cliente->id) }}">{{ $evento->cliente->cedula }}</a></li>
					<li class="list-group-item"><b>Fecha Evento: </b>{{ $evento->fecha_evento->toDateString() }}</li>
					<li class="list-group-item"><b>Hora Inicio: </b>{{ $evento->hora_inicio }}</li>
					<li class="list-group-item"><b>Hora Fin: </b>{{ $evento->hora_fin }}</li>
					<li class="list-group-item"><b>Cantidad de Cuotas: </b>{{ $evento->nro_cuotas }}</li>
					@if($evento->estatus=="Pen")
					<li class="list-group-item"><b>Estatus: </b>Pendiente</span></li>
					@elseif($evento->estatus=="Pro")
					<li class="list-group-item"><b>Estatus: </b>En Proceso</span></li>
					@elseif($evento->estatus=="Pag")
					<li class="list-group-item"><b>Estatus: </b>Pagado</span></li>
					@elseif($evento->estatus=="Pla")
					<li class="list-group-item"><b>Estatus: </b>Planificando</span></li>
					@elseif($evento->estatus=="Org")
					<li class="list-group-item"><b>Estatus: </b>Organizando</span></li>
					@elseif($evento->estatus=="Eje")
					<li class="list-group-item"><b>Estatus: </b>Ejecutando</span></li>
					@elseif($evento->estatus=="Cer")
					<li class="list-group-item"><b>Estatus: </b>Cerrado</span></li>
					@elseif($evento->estatus=="Fin")
					<li class="list-group-item"><b>Estatus: </b>Finalizado</span></li>
					@else
					<li class="list-group-item"><b>Estatus: </b>Sin estatus</span></li>
					@endif
				</ul>
			</div>
		</div>
		<div class="text-center page-header">
			<h1 class="text-center">Cuotas Pagadas</h1>
		</div>
		@if(count($evento->pagos)>0)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
				        <th>Nro Referencia</th>
				        <th>Fecha del Pago</th>
				        <th>Importe</th>
				        <th>Metodo de Pago</th>
				        <th>Descripción</th>
				        <th>Estatus</th>
							</tr>
						</thead>
						<tbody>
							@foreach($evento->pagos as $pagos)
							<tr>								
								<td>{{ $pagos->referencia_bancaria }}</td>
								<td>{{ $pagos->fecha_pago }}</td>
								<td>{{ $pagos->importe }} <b>{{ $config->moneda }}</b></td>
								<td>{{ $pagos->metodo_pago }}</td>
								<td>{{ $pagos->descripcion }}</td>
								@if($pagos->estatus=="Pen")
								<td><span class="badge badge-danger">Pendiente</span></td>
								@elseif($pagos->estatus=="Pag")
								<td><span class="badge badge-success">Pagado</span></td>
								@else
								<td><span class="badge badge-primary">Sin estatus</span></td>
								@endif
							</tr>
							@endforeach
							</tbody>
						</table>
				</div>
			</div>
		</div>
		@else
		<div class="jumbotron">
			<h1 class="text-center">No existen registros de Cuotas para este Evento</h1>
		</div>
		@endif
	</div>
	<div class="panel-footer">
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	</div>
</div>

@endsection