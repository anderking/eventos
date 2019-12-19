@extends ('admin.template.main')

@section('title','Recepcionista-Pago-Show')
@section('body_class','recepcionista_pagos_show')
@section('main_class','recepcionista_pagos_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Pago {{ $pago->referencia_bancaria }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $pago->referencia_bancaria }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					@if($pago->id<=9)
					<li class="list-group-item"><b>ID: </b>PG00{{ $pago->id }}</li>
					@elseif($pago->id>9 and $pago->id<=99)
					<li class="list-group-item"><b>ID: </b>PG0{{ $pago->id }}</li>
					@endif
					@if($pago->evento_id<=9)
					<li class="list-group-item"><b>Evento: </b><a href="{{ route('recepcionista.eventos.show',$pago->evento_id) }}">E00{{ $pago->evento_id }}</a></li>
					@elseif($pago->evento_id>9 and $pago->evento_id<=99)
					<li class="list-group-item"><b>Evento: </b><a href="{{ route('recepcionista.eventos.show',$pago->evento_id) }}">E00{{ $pago->evento_id }}</a></li>
					@endif
					<li class="list-group-item"><b>Nro Referencia: </b>{{ $pago->referencia_bancaria }}</li>
					<li class="list-group-item"><b>Fecha del Pago: </b>{{ $pago->fecha_pago->toDateString() }}</li>
					<li class="list-group-item"><b>Metodo de Pago: </b>{{ $pago->metodo_pago }}</li>
					<li class="list-group-item"><b>Importe: </b>{{ $pago->importe }} <b>{{ $config->moneda }}</b></li>
					<li class="list-group-item"><b>Descripción: </b>{{ $pago->descripcion }}</li>
					@if($pago->estatus=="Pen")
					<li class="list-group-item"><b>Estatus: </b>Pendiente</li>
					@elseif($pago->estatus=="Pag")
					<li class="list-group-item"><b>Estatus: </b>Pagado</li>
					@else
					<li class="list-group-item"><b>Estatus: </b>Sin estatus</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	</div>
</div>

@endsection