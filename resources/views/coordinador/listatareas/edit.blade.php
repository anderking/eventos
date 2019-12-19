@extends ('admin.template.main')

@section('title','Coordinador-ListaTarea-Edit')
@section('body_class','coordinador_listatareas_edit')
@section('main_class','coordinador_listatareas_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización de la Tarea del Evento</h1>
</div>

{!! Form::open(array('route' => ['coordinador.listatareas.update',$eventotarea],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}

<div class="panel panel-primary box_flot">
	
	<div class="panel-heading">
		<h3 class="panel-title">Editar  {{ $eventotarea->id }}</h3>
	</div>
	
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

				<div class="form-group">
					{!! Form::label('fecha_resolucion', 'Fecha de Resolución:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_resolucion', $eventotarea->fecha_resolucion, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('estatust', 'Estatus:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('estatust', array('P' => 'Pendiente', 'F' => 'Finalizada'), $eventotarea->estatust, ['class'=>'form-control','required']) !!}
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
				{!! Form::submit('Actualizar',['class'=>'btn btn-info']) !!}
				{!! Form::reset('Cancelar',['class'=>'btn btn-primary']) !!}
				<a href="{{ route('coordinador.listatareas.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>

</div>

{!! Form::close() !!}
@endsection
