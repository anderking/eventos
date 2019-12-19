@extends ('admin.template.main')

@section('title','Recepcionista-Pago-Edit')
@section('body_class','recepcionista_clientes_edit')
@section('main_class','recepcionista_clientes_edit')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Actualización del Pago</h1>
</div>

{!! Form::open(array('route' => ['recepcionista.pagos.update',$pago],'method' => 'PUT','files' => true,'class'=>'form-horizontal')) !!}
<div class="panel panel-primary box_flot">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Pago {{$pago->id}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('descripcion', 'Descripción:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('descripcion', $pago->descripcion, ['class'=>'form-control','placeholder'=>'Descripción','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('fecha_pago', 'Fecha Pago:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::date('fecha_pago', $pago->fecha_pago, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('importe', 'Importe:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('importe', $pago->importe, ['class'=>'form-control','placeholder'=>'Importe','required','readonly']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('metodo_pago', 'Metodo de Pago:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('metodo_pago', array(''=>'Seleccione un Metodo','Efectivo' => 'Efectivo', 'Transferencia' => 'Transferencia','Deposito'=>'Deposito','Debito'=>'Debito','Credito'=>'Credito'), $pago->metodo_pago, ['class'=>'form-control','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('referencia_bancaria', 'Numero de Referencia:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('referencia_bancaria', $pago->referencia_bancaria, ['id'=>'referencia_bancaria','class'=>'form-control','placeholder'=>'Numero de Referencia','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('estatus', 'Estatus:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::select('estatus', array('Pen' => 'Pendiente', 'Pag' => 'Pagada'), $pago->estatus, ['class'=>'form-control','required']) !!}
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
				<a href="{{ route('recepcionista.pagos.index') }}" class="btn btn-default">Regresar</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection

@section('js')

<script>

$( document ).ready(function() {

	$("#cedula,#cant_hijos").keypress(function (key) {
		window.console.log(key.charCode)
		if ( 
				(key.charCode <48 || key.charCode >57) && //0-9
				(key.charCode != 127 && key.charCode != 46)//delete y punto
			)
	                return false;
	});

});

</script>

@endsection