@extends ('admin.template.main')

@section('title','Recepcionista-Cotización-Create')
@section('body_class','recepcionista_cotizaciones_create')
@section('main_class','recepcionista_cotizaciones_create')
@section('content')

@if(count($cliente_all)>0 && count($local)>0 && count($costo)>0)


<div class="text-center page-header">
	<h1 class="text-center">Registro de Cotizaciones</h1>
</div>

{!! Form::open(array('route' => 'recepcionista.cotizaciones.store','method' => 'POST','class'=>'form-horizontal')) !!}

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Cotización</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<ul class=" nav nav-tabs" role="tablist">
					<li class="box_efect_tab active" role="presentation">
						<a href="#cotizacion" aria-controls="cotizacion" role="tab" data-toggle="tab">Cotización</a>
					</li>
					<li class="box_efect_tab">
						<a href="#locales" aria-controls="locales" role="tab" data-toggle="tab">Locales</a>
					</li>
					<li class="box_efect_tab">
						<a href="#servicios" aria-controls="servicios" role="tab" data-toggle="tab">Servicios</a>
					</li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="cotizacion">
						@if (count($cliente_all)>0)
						<div class="form-group">
							{!! Form::label('cliente_id', 'Cliente:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-5">
								{!! Form::select('cliente_id', $cliente, null, ['id'=>'cliente_id','class'=>'form-control select_cliente','onchange'=>'habilitar_registrar()']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('descripcion', 'Descripcion de la Cotización:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-5">
								{!! Form::text('descripcion', null, ['id'=>'descripcion','class'=>'form-control','placeholder'=>'Descripcion','required','onchange'=>'habilitar_registrar()']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('nro_invitados', 'Nro Invitados:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-5">
								{!! Form::text('nro_invitados', null, ['id'=>'nro_invitados','class'=>'form-control','placeholder'=>'Nro Invitados','required','onchange'=>'habilitar_registrar()']) !!}
							</div>
						</div>
						{!! Form::hidden('estatus','P') !!}
						@else
							<div class="jumbotron">
								<h1 class="text-center">No existen registros de Clientes en nuestra Base de Datos</h1>
								<div class="text-center">
									<a href="{{ route('recepcionista.clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
								</div>
							</div>
						@endif
					</div>
					<div role="tabpanel" class="tab-pane" id="locales">
					@if (count($local)>0)
						<div class="table-responsive">
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										<th>Seleccionar</th>
										<th>Tipo de Local</th>
										<th>Nombre</th>
										<th>Dirección</th>
										<th>Capacidad</th>
										<th>Estacionamiento</th>
										<th>Vigilancia</th>
										<th>Precio</th>
										<th>IVA</th>
									</tr>
								</thead>
								<tbody>
									@for ($i = 0; $i < count($local); $i++)
									<tr>
										<td>
											<div class="form-group">
											<!--{!! Form::radio('local_id', $local[$i]->id,false,['id'=>'local_radio_'.$i.'','class'=>'local_radio','onclick'=>'
											if (this.checked)
												sumar('.number_format( $local[$i]->precio_venta, 2, '.', '').','.number_format($local[$i]->IVA, 2, '.', '').')
											else
												restar('.number_format($local[$i]->precio_venta, 2, '.', '').','.number_format($local[$i]->IVA, 2, '.', '').')','required']) !!}-->
												{!! Form::radio('local_id', $local[$i]->id,false,['id'=>'local_radio_'.$i.'','class'=>'local_radio','required','onclick'=>'habilitar_registrar()']) !!}
											</div>
										</td>
										<td>{{ $local[$i]->tipo_local->name }}</td>
										<td>{{ $local[$i]->name }}</td>
										<td>{{ $local[$i]->direccion }}</td>
										<td>{{ $local[$i]->capacidad }}</td>
										<td>{{ $local[$i]->estacionamiento }}</td>
										<td>{{ $local[$i]->vigilancia }}</td>
										<td>{{ number_format($local[$i]->precio_venta, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
										<td>{{ number_format($local[$i]->IVA, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
									</tr>
									@endfor
									<!--
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>
											{!! Form::text('monto_total_venta', null, ['id'=>'monto_total_venta','class'=>'form-control','placeholder'=>'Total Venta','readonly']) !!}
										</td>
										<td>
											{!! Form::text('monto_total_iva', null, ['id'=>'monto_total_iva','class'=>'form-control','placeholder'=>'Total IVA','readonly']) !!}
										</td>
										<td></td>
									</tr>-->
								</tbody>
							</table>
						</div>
						@else
						<div class="jumbotron">
							<h1 class="text-center">No existen registros de Locales en nuestra Base de Datos</h1>
							<div class="text-center">
								<a href="#" data-toggle="modal" data-target="#modal-permiso-create-local" class="btn btn-primary">Nuevo Local</a>
							</div>
						</div>
						@endif
					</div>
					<div role="tabpanel" class="tab-pane" id="servicios">
						@if (count($costo)>0)
						<div class="table-responsive">
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										<th>Seleccionar</th>
										<th>Servicio</th>
										<th>Item</th>
										<th>Proveedor</th>
										<th>Precio Venta</th>
										<th>IVA</th>
										<th>Cantidad</th>
									</tr>
								</thead>
								<tbody>
									@for ($i = 0; $i < count($costo); $i++)
									<tr>
										<td>
											<div class="checkbox">
												<label class="control-label">
													<input name="costo[]" type="checkbox" value="{{ $costo[$i]->id }}" onchange="
													if (this.checked)
													sumar( {{ number_format($costo[$i]->precio_venta, 2, '.', '') }},{{ number_format($costo[$i]->IVA, 2, '.', '') }});
													else
													restar( {{ number_format($costo[$i]->precio_venta, 2, '.', '') }},{{ number_format($costo[$i]->IVA, 2, '.', '') }} );"
													onclick="habilitar_cantidad();habilitar_registrar()">
												</label>
											</div>
										</td>
										<td>{{ $costo[$i]->item->servicio->name }}</td>
										<td>{{ $costo[$i]->item->descripcion }}</td>
										<td>{{ $costo[$i]->proveedor->razon_social }}</td>
										<td>{{ number_format($costo[$i]->precio_venta, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
										<td>{{ number_format($costo[$i]->IVA, 2, '.', '') }} <b>{{ $config->moneda}}</b></td>
										<td>
											<div class="form-group">
												{!! Form::text('cantidad[]', null, ['id'=>'cantidad_'.$i.'','class'=>'form-control cantidad','placeholder'=>'Cantidad a solicitar','required','disabled','onchange'=>'habilitar_registrar()']) !!}
											</div>
										</td>
									</tr>
									@endfor
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Sub Total</b></td>
										<td>
											{!! Form::text('monto_total_venta', null, ['id'=>'monto_total_venta','class'=>'form-control','placeholder'=>'Total Venta','readonly']) !!}
										</td>
										<td>
											{!! Form::text('monto_total_iva', null, ['id'=>'monto_total_iva','class'=>'form-control','placeholder'=>'Total IVA','readonly']) !!}
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
						@else
						<div class="jumbotron">
							<h1 class="text-center">No existen registros de Costos en nuestra Base de Datos</h1>
							<div class="text-center">
								<a href="#" data-toggle="modal" data-target="#modal-permiso-create-costo" class="btn btn-primary">Nuevo Costo</a>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar', ['id'=>'registrar','class'=>'btn btn-info','disabled']) !!}
				<a href="{{ route('recepcionista.cotizaciones.create') }}" class="btn btn-primary">Cancelar</a>
				<a href="{{ route('recepcionista.cotizaciones.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}


@else
	<div class="jumbotron">
		<h1>No existen registros de Clientes, Locales o Costos para realizar una Cotización</h1>
		<p>Para crear una Cotización considere que deben existir en la Base de Datos al menos un cliente, un local y un costo registrado</p>
		<p>Por favor registre los 3.</p>
		<a href="{{ route('recepcionista.clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
		<a href="#" data-toggle="modal" data-target="#modal-permiso-create-local" class="btn btn-primary">Nuevo Local</a>
		<a href="#" data-toggle="modal" data-target="#modal-permiso-create-costo" class="btn btn-primary">Nuevo Costo</a>
		<a href="{{ route('recepcionista.cotizaciones.index') }}" class="btn btn-default">Regresar</a>

	</div>
@endif

@include('recepcionista.template.partials.modal-permiso-create-local')
@include('recepcionista.template.partials.modal-permiso-create-costo')

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$("#nro_invitados,#cedula_solicitante,.cantidad").keypress(function (key) {
		window.console.log(key.charCode)
		if ( 
				(key.charCode <48 || key.charCode >57) && //0-9
				(key.charCode != 127 && key.charCode != 46)//delete y punto
			)
	                return false;
	});

	$(".select_cliente").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Cliente"
	});

});

	var monto_total_venta=0.00;
	var monto_total_iva=0.00;
	
	function sumar(venta,iva)
	{
		var check = document.getElementsByName('costo[]');

		monto_total_venta += venta;
		monto_total_iva += iva;

		document.getElementById('monto_total_venta').value=monto_total_venta.toFixed(2);
		document.getElementById('monto_total_iva').value=monto_total_iva.toFixed(2);
	}

	function restar(venta,iva) {
		monto_total_venta -= venta;
		monto_total_iva -= iva;

		document.getElementById('monto_total_venta').value=monto_total_venta.toFixed(2);
		document.getElementById('monto_total_iva').value=monto_total_iva.toFixed(2);
	}

	function habilitar_cantidad()
	{
		var check = document.getElementsByName('costo[]');

		for(i=0; i<check.length; i++)
		{
			var cantidad = document.getElementsByName('cantidad[]');
			if(check[i].checked)
			{
				cantidad[i].disabled=false;
			}
			else
			{
				cantidad[i].disabled=true;
				cantidad[i].value =null;
			}
		}
	}

	function habilitar_registrar()
	{
		var check = document.getElementsByName('costo[]');
		var cantidad = document.getElementsByName('cantidad[]');
		var radio = document.getElementsByName('local_id');
		var registrar = document.getElementById('registrar');
		var cliente_id = document.getElementById('cliente_id');
		var descripcion = document.getElementById('descripcion');
		var nro_invitados = document.getElementById('nro_invitados');

		var valido1 = false;
		var valido2 = false;
		var valido3 = false;

		var valido4 = false;
		var valido5 = false;
		var valido6 = false;


		for(i=0; i<check.length; i++)
		{
			if(check[i].type=="checkbox" && check[i].checked==true)
			{
				valido1 = true;
			}
		}
		
		for (var i = 0; i < cantidad.length; i++)
		{
			if (cantidad[i].value!="")
			{
				valido3=true;
			}
		}

		for(i=0; i<radio.length; i++)
		{
			if(radio[i].type=="radio" && radio[i].checked==true)
			{
				valido2 = true;
			}
		}

		if(cliente_id.value!="")
		{
			valido4=true;
		}

		if(descripcion.value!="")
		{
			valido5=true;
		}

		if(nro_invitados.value!="")
		{
			valido6=true;
		}

		if(valido1==true && valido2==true && valido3==true && valido4==true && valido5==true && valido6==true)
		{
			registrar.disabled=false;
		}
		else
		{
			registrar.disabled=true;
		}

		
	}

</script>

@endsection
