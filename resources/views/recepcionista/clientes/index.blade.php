@extends ('admin.template.main')
<?php
  $ruta = Request::Url();
  $fullruta = Request::fullUrl();
?>
@section('title','Recepcionista-Cliente')
@section('body_class','recepcionista_clientes_index')
@section('main_class','recepcionista_clientes_index')
@section('content')

<h1 class="text-center">Lista de Clientes</h1>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
		<a href="{{ route('recepcionista.clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 text-center">
  	{!! Form::open(array('route' => 'recepcionista.clientes.index','method' => 'GET','class'=>'navbar-form')) !!}
    <div class="input-group">
      {!! Form::text('cedula', null, ['class'=>'form-control','placeholder'=>'Buscar...','aria-describedby'=>'search','required']) !!}
      <span class="input-group-btn" >
        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@if (count($cliente)>0)
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th>Direccion</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cliente as $clientes)
			<tr>
				@if($clientes->id<=9)
				<td><a href="{{ route('recepcionista.clientes.show',$clientes->id) }}">CL00{{ $clientes->id }}</a></td>
				@elseif($clientes->id>9 and $clientes->id<=99)
				<td><a href="{{ route('recepcionista.clientes.show',$clientes->id) }}">CL0{{ $clientes->id }}</a></td>
				@endif
				<td>{{ $clientes->cedula }}</td>
				<td>{{ $clientes->name }}</td>
				<td>{{ $clientes->apellido }}</td>
				<td>{{ $clientes->sex }}</td>
				<td>{{ $clientes->direccion }}</td>
				<td>{{ $clientes->email }}</td>
				<td>{{ $clientes->telefono_movil }}</td>
				<td>
					<a class="btn btn-info" href="{{ route('recepcionista.clientes.edit',$clientes->id)}}">Modificar</a>
					<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete-clientes-{{$clientes->id}}"><b>Eliminar</b>
				</td>
			</tr>
			@include('recepcionista.template.partials.modal-delete-clientes')
			@endforeach
		</tbody>
	</table>
</div>
@else
	<div class="jumbotron">
		<h1 class="text-center">No existen registros de Clientes en nuestra Base de Datos</h1>
	</div>
	<div class="text-center">
		<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
	</div>
@endif

@if(count($cliente)>0)
	@if($ruta!=$fullruta)
		<div class="text-center">
			<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</a>
		</div>
	@endif
@endif

@endsection