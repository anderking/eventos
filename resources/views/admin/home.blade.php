@extends ('admin.template.main')

@section('title','Admin-Home')
@section('body_class','admin_home')
@section('main_class','admin_home')

@section('content')

<div class="page-header">
	<h1 class="text-center">Bienvenido {{Auth::user()->rol->name}} {{ Auth::user()->name }} {{ Auth::user()->apellido }}</h1>
  <h1 class="text-center">Gestion de configuraciones</h1>
</div>
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
				<ul class="list-group">
				  <li class="list-group-item text-center"><a href="{{ route('admin.config.index') }}">Configuración de Costos</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection