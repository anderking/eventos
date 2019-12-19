@extends ('admin.template.main')

@section('title','Admin-Costo-Create')
@section('body_class','admin_costos_create')
@section('main_class','admin_costos_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Costos</h1>
</div>
@if(count($item_all)>0 && count($proveedor_all)>0)
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Costo</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.costos.store','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('item_id', 'Item:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('item_id', $item, null, ['class'=>'form-control select_item','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('proveedor_id', 'Proveedor:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('proveedor_id', $proveedor, null, ['class'=>'form-control select_proveedor','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio_compra', 'Precio Compra:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('precio_compra', null, ['id'=>'precio_compra','class'=>'form-control','placeholder'=>'Precio Compra','required','onchange'=>'sumar()']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('IVA', 'IVA:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('IVA', null, ['id'=>'IVA','class'=>'form-control','placeholder'=>'IVA','required','readonly']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio_venta', 'Precio Venta:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('precio_venta', null, ['id'=>'precio_venta','class'=>'form-control','placeholder'=>'Precio Venta','required','readonly']) !!}
					</div>
				</div>
				@if($config)
					{!! Form::hidden('porc_iva',$config->porc_iva,['id'=>'porc_iva']) !!}
					{!! Form::hidden('margen_ganancia',$config->margen_ganancia,['id'=>'margen_ganancia']) !!}
				@else
					{!! Form::hidden('porc_iva',0.00,['id'=>'porc_iva']) !!}
					{!! Form::hidden('margen_ganancia',0.00,['id'=>'margen_ganancia']) !!}
				@endif

			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('admin.costos.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}


@else
	<div class="jumbotron">
		<h1>No existen Items o Proveedores registrados</h1>
		<p>No puede registrar un nuevo Costo sin tener Items o Proveedores, Por favor cree ambos para continuar.</p>
		<h2>
			<a href="{{ route('admin.items.create') }}" class="btn btn-primary">Nuevo Item</a>
			<a href="{{ route('admin.proveedores.create') }}" class="btn btn-primary">Nuevo Proveedor</a>
		</h2>
		<h2></h2>
	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$('#precio_compra').numeric(".");
	$("#precio_compra").keypress(function (key) {
		window.console.log(key.charCode)
		if ( 
				(key.charCode <48 || key.charCode >57) && //0-9
				(key.charCode != 127 && key.charCode != 46)//delete y punto
			)
	                return false;
	});

	$(".select_item").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Item"
	});

	$(".select_proveedor").chosen({
		max_selected_options: 10,
		no_results_text: "Ningún resultado coincide!",
		placeholder_text_multiple: "Seleccione un Proveedor"
	});

});

</script>

<script>
	function sumar()
	{
		var compra = document.getElementById('precio_compra').value;
		var porc_iva = document.getElementById('porc_iva').value;
		var margen_ganancia = document.getElementById('margen_ganancia').value;	
		if(compra=="")
			compra=0.00;
		var iva = compra*porc_iva;
		var ganancia = compra*margen_ganancia;
		var venta = parseFloat(compra)+parseFloat(iva)+parseFloat(ganancia);
		document.getElementById('IVA').value=iva.toFixed(2);
		document.getElementById('precio_venta').value=venta.toFixed(2);
	}
</script>
@endsection