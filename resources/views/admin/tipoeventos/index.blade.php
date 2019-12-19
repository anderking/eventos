@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Admin-TipoEvento')
@section('body_class','admin_tipoeventos_index')
@section('main_class','admin_tipoeventos_index')
@section('content')

<h1 class="text-center">Lista de Tipo de Eventos</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('admin.tipoeventos.create') }}" class="btn btn-primary">Nuevo Tipo de Evento</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'admin.tipoeventos.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('id', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($tipoevento)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipoevento as $tipoeventos)
			<tr>
				@if($tipoeventos->id<=9)
				<td><a href="{{ route('admin.tipoeventos.show',$tipoeventos->id) }}">TE00{{ $tipoeventos->id }}</a></td>
				@elseif($tipoeventos->id>9 and $tipoeventos->id<=99)
				<td><a href="{{ route('admin.tipoeventos.show',$tipoeventos->id) }}">TE0{{ $tipoeventos->id }}</a></td>
				@endif
				<td>{{ $tipoeventos->name }}</td>
				<td>{{ $tipoeventos->descripcion }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('admin.tipoeventos.edit',$tipoeventos->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-tipoeventos-{{$tipoeventos->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('admin.template.partials.modal-delete-tipoeventos')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Tipo de Eventos en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($tipoevento)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection