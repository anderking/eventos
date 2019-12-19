@extends ('admin.template.main')

@section('title','Admin-Costo-Edit')
@section('body_class','admin_costos_edit')
@section('main_class','admin_costos_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización de Costos</h1>
</div>

{!! Form::open(array('route' => ['admin.costos.update',$costo],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Costo {{$costo->id}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('item_id', 'Item:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('item_id', $item, $costo->item_id, ['class'=>'form-control select_item','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('proveedor_id', 'Proveedor:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('proveedor_id', $proveedor, $costo->proveedor_id, ['class'=>'form-control select_item','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio_compra', 'Precio Compra:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('precio_compra', $costo->precio_compra, ['id'=>'precio_compra','class'=>'form-control','placeholder'=>'Precio Compra','required','onchange'=>'sumar()']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('IVA', 'IVA:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('IVA', $costo->IVA, ['id'=>'IVA','class'=>'form-control','placeholder'=>'IVA','required','readonly']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio_venta', 'Precio Venta:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('precio_venta', $costo->precio_venta, ['id'=>'precio_venta','class'=>'form-control','placeholder'=>'Precio Venta','required','readonly']) !!}
					</div>
				</div>
				{!! Form::hidden('porc_iva',$config->porc_iva,['id'=>'porc_iva']) !!}
				{!! Form::hidden('margen_ganancia',$config->margen_ganancia,['id'=>'margen_ganancia']) !!}
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('admin.costos.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
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