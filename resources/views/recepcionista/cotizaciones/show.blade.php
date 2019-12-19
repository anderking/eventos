@extends ('admin.template.main')

@section('title','Recepcionista-Cotzación-Show')
@section('body_class','recepcionista_cotizaciones_show')
@section('main_class','recepcionista_cotizaciones_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles de la Cotización {{ $cotizacion->descripcion }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $cotizacion->descripcion }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					@if($cotizacion->id<=9)
					<li class="list-group-item"><b>ID: </b>CZ00{{ $cotizacion->id }}</li>
					@elseif($cotizacion->id>9 and $cotizacion->id<=99)
					<li class="list-group-item"><b>ID: </b>CZ0{{ $cotizacion->id }}</li>
					@endif
					<li class="list-group-item"><b>Cedula Solicitante: </b><a href="{{ route('recepcionista.clientes.show',$cotizacion->cliente->id) }}">{{ $cotizacion->cliente->cedula }}</a></li>
					<li class="list-group-item"><b>Descripción: </b>{{ $cotizacion->descripcion }}</li>
					<li class="list-group-item"><b>Nro de Invitados: </b>{{ $cotizacion->nro_invitados }}</li>
					<li class="list-group-item"><b>Estatus: </b>
						@if($cotizacion->estatus=="P")
						Pendiente
						@elseif($cotizacion->estatus=="C")
						Confirmada
						@elseif($cotizacion->estatus=="A")
						Asignada
						@else
						Sin Estatus
						@endif
					</li>
				</ul>
			</div>
		</div>
		<div class="text-center page-header">
			<h1 class="text-center">Servicios Cotizados</h1>
		</div>
		@if($cotizacion->local)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<h2 class="text-center">Local</h2>
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Tipo de Local</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Dirección</th>
								<th>Capacidad</th>
								<th>Estacionamiento</th>
								<th>Capacidad Estacionamiento</th>
								<th>Cantidad de Baños</th>
								<th>Vigilancia</th>
								<th>Precio Venta</th>
								<th>IVA</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $cotizacion->local->tipo_local->name }}</td>
								<td>{{ $cotizacion->local->name }}</td>
								<td>{{ $cotizacion->local->descripcion }}</td>
								<td>{{ $cotizacion->local->direccion }}</td>
								<td>{{ $cotizacion->local->capacidad }}</td>
								<td>{{ $cotizacion->local->estacionamiento }}</td>
								<td>{{ $cotizacion->local->capacidad_est }}</td>
								<td>{{ $cotizacion->local->cant_baños }}</td>
								<td>{{ $cotizacion->local->vigilancia }}</td>
								<td>{{ number_format($cotizacion->local->precio_venta, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
								<td>{{ number_format($cotizacion->local->IVA, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
							</tr>
							<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Total</b></td>
									@if($config)
									<td>{{ number_format($cotizacion->local->precio_venta, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
									<td>{{ number_format($cotizacion->local->IVA, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
									@else
									<td>{{ number_format($cotizacion->local->precio_venta, 2, '.', '') }}</td>
									<td>{{ number_format($cotizacion->local->IVA, 2, '.', '') }}</td>
									@endif
								</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@else
			<div class="jumbotron">
				<h1 class="text-center">No existen registros de Locales para esta Cotización</h1>
			</div>
		@endif

		@if(count($cotizacion->costos)>0)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<h2 class="text-center">Servicios</h2>
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Tipo Servicio</th>
								<th>Servicio</th>
								<th>Item</th>
								<th>Proveedor</th>
								<th>Precio Venta</th>
								<th>IVA</th>
								<th>Cantidad</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cotizacion->costos as $cotizacion_costo)
							<tr>
								<td>{{ $cotizacion_costo->item->servicio->tipo_servicio->name}}</td>
								<td>{{ $cotizacion_costo->item->servicio->name }}</td>
								<td>{{ $cotizacion_costo->item->descripcion }}</td>
								<td>{{ $cotizacion_costo->proveedor->razon_social }}</td>
								@if($config)
								<td>{{ $cotizacion_costo->precio_venta }} <b>{{ $config->moneda }}</b></td>
								<td>{{ $cotizacion_costo->IVA }} <b>{{ $config->moneda }}</b></td>
								@else
								<td>{{ $cotizacion_costo->precio_venta }}</td>
								<td>{{ $cotizacion_costo->IVA }}</td>
								@endif
								<td>{{ $cotizacion_costo->pivot->cantidad}}</td>
							</tr>
							@endforeach
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Total</b></td>
									@if($config)
									<td>{{ $totalventa}} <b>{{ $config->moneda }}</b></td>
									<td>{{ $totaliva }} <b>{{ $config->moneda }}</b></td>
									@else
									<td>{{ $totalventa}}</td>
									<td>{{ $totaliva }}</td>
									@endif
									<td>{{ $totalcantidad }}</td>
								</tr>
							</tbody>
						</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="jumbotron">
					<div class="text-center">
						<h2>Sub Total Venta: {{ $totalfinalventa }} {{ $config->moneda }}</h2>
						<h2>Sub Total IVA: {{ $totalfinaliva }} {{ $config->moneda }}</h2>
						<h2>Total: {{ $totalfinalventa+$totalfinaliva }} {{ $config->moneda }}</h2>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="text-center">
			<a href="{{ route('recepcionista.cotizaciones.pdf',$cotizacion->id) }}" class="btn btn-primary">Ver Comprobante</a>
		</div>-->
		@else
			<div class="jumbotron">
				<h1 class="text-center">No existen registros de Servicios para esta Cotización</h1>
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