@extends ('admin.template.main')

@section('title','Admin-Item-Create')
@section('body_class','admin_items_create')
@section('main_class','admin_items_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Items</h1>
</div>
@if(count($servicio_all)>0)
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Item</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'admin.items.store','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('servicio_id', 'Servicio:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('servicio_id', $servicio, null, ['class'=>'form-control select_serv','required']) !!}
						<p>
							<a href="{{ route('admin.servicios.create') }}">¿Nuevo Servicio?</a>
						</p>
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('descripcion', 'Descripcion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('stock', 'Stock:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('stock', null, ['id'=>'stock','class'=>'form-control','placeholder'=>'Stock']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('admin.items.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@else
	<div class="jumbotron">
		<h1>No existen Servicios registrados</h1>
		<p>No puede registrar un nuevo Item sin tener Servicios, Por favor cree un Servicio.</p>
		<h2><a href="{{ route('admin.servicios.create') }}" class="btn btn-primary">Nuevo Servicio</a></h2>
	</div>
@endif

@endsection

@section('js')

<script>

$( document ).ready(function() {

	$("#stock").keypress(function (key) {
		window.console.log(key.charCode)
		if ( 
				(key.charCode <48 || key.charCode >57) && //0-9
				(key.charCode != 127)
			)
	                return false;
	});

});

</script>

@endsection