@extends ('admin.template.main')

@section('title','Admin-Costo-Show')
@section('body_class','admin_roles_show')
@section('main_class','admin_roles_show')

@section('content')

<div class="text-center page-header">
	<h1 class="text-center">Detalles del Costo {{ $costo->item->descripcion }}</h1>
</div>

<div class="panel panel-primary box_flo">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $costo->item->descripcion }}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
				<ul class="list-group">
					<li class="list-group-item"><b>ID: </b>{{ $costo->id }}</li>
					<li class="list-group-item"><b>Item: </b>{{ $costo->item->descripcion }}</li>
					<li class="list-group-item"><b>Proveedor: </b>{{ $costo->proveedor->razon_social }}</li>
					@if($config)
					<li class="list-group-item"><b>Precio Compra: </b>{{ $costo->precio_compra }} <b>{{$config->moneda}}</b></li>
					<li class="list-group-item"><b>IVA: </b>{{ $costo->IVA }} <b>{{$config->moneda}}</b></li>
					<li class="list-group-item"><b>Precio de Venta: </b>{{ $costo->precio_venta }} <b>{{$config->moneda}}</b></li>
					@else
					<li class="list-group-item"><b>Precio Compra: </b>{{ $costo->precio_compra }}</li>
					<li class="list-group-item"><b>IVA: </b>{{ $costo->IVA }}</li>
					<li class="list-group-item"><b>Precio de Venta: </b>{{ $costo->precio_venta }}</li>
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