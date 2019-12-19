@extends ('admin.template.main')

@section('title','Admin-TipoServicio-Create')
@section('body_class','admin_tipocomites_create')
@section('main_class','admin_tipocomites_create')
@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Registro de Tipo de Comités</h1>
</div>

<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Registrar Tipo de Comité</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(array('route' => 'planificador.tipotareas.store','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('name', 'Nombre:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('descripcion', 'Descripcion:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion','required']) !!}
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
				<a href="{{ route('planificador.tipotareas.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}



@endsection