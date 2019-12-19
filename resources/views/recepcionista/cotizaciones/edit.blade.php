@extends ('admin.template.main')

@section('title','Admin-Cotización-Edit')
@section('body_class','recepcionista_cotizaciones_edit')
@section('main_class','recepcionista_cotizaciones_edit')

@section('content')
{!! Form::open(array('route' => ['recepcionista.cotizaciones.update',$cotizacion],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}

<div class="text-center page-header">
	<h1 class="text-center">Actualización de la Cotización</h1>
</div>

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Cotización {{$cotizacion->descripcion}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<ul class=" nav nav-tabs" role="tablist">
					<li class="box_efect_tab active" role="presentation">
						<a href="#cotizacion" aria-controls="cotizacion" role="tab" data-toggle="tab">Cotización</a>
					</li>
					@if($cotizacion->estatus!="A")
					<li class="box_efect_tab">
						<a href="#locales" aria-controls="locales" role="tab" data-toggle="tab">Locales</a>
					</li>
					<li class="box_efect_tab">
						<a href="#servicios" aria-controls="servicios" role="tab" data-toggle="tab">Servicios</a>
					</li>
					@endif
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="cotizacion">
						<div class="form-group">
							{!! Form::label('descripcion', 'Descripcion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-5">
								{!! Form::text('descripcion', $cotizacion->descripcion, ['class'=>'form-control','placeholder'=>'Descripcion','required']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('nro_invitados', 'Nro Invitados:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-5">
								{!! Form::text('nro_invitados', $cotizacion->nro_invitados, ['id'=>'nro_invitados','class'=>'form-control','placeholder'=>'Nro Invitados','required']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('estatus', 'Estatus:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
							<div class="col-xs-12 col-sm-10 col-md-5">
								{!! Form::select('estatus', array('P' => 'Pendiente', 'C' => 'Confirmada','A'=>'Asignada'), $cotizacion->estatus, ['class'=>'form-control','required']) !!}
							</div>
						</div>
					</div>
					@if($cotizacion->estatus!="A")
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
												@if($local[$i]->id==$cotizacion->local->id)	
												{!! Form::radio('local_id', $local[$i]->id, true,['id'=>'local_radio_'.$i.'','class'=>'local_radio','required']) !!}
												@else
												{!! Form::radio('local_id', $local[$i]->id, false,['id'=>'local_radio_'.$i.'','class'=>'local_radio','required']) !!}
												@endif
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
								</tbody>
							</table>
						</div>
						@else
						<div class="jumbotron">
							<h1 class="text-center">No existen registros de Locales en nuestra Base de Datos</h1>
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
													sumar( {{ number_format($costo[$i]->precio_venta, 2, '.', '') }},{{ number_format($costo[$i]->IVA, 2, '.', '') }} );
													else
													restar( {{ number_format($costo[$i]->precio_venta, 2, '.', '') }},{{ number_format($costo[$i]->IVA, 2, '.', '') }} );"
													onclick="habilitar_cantidad()">
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
												{!! Form::text('cantidad[]', null, ['id'=>'cantidad_'.$i.'','class'=>'form-control cantidad','placeholder'=>'Cantidad a solicitar','required','disabled']) !!}
											</div>
										</td>
									</tr>
									@endfor
									<tr>
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
									</tr>
								</tbody>
							</table>
						</div>
						@else
						<div class="jumbotron">
							<h1 class="text-center">No existen registros de Costos en nuestra Base de Datos</h1>
						</div>
						@endif
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
				<a href="{{ route('recepcionista.cotizaciones.edit',$cotizacion->id) }}" class="btn btn-primary">Cancelar</a>
				<a href="{{ route('recepcionista.cotizaciones.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
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

</script>

@endsection