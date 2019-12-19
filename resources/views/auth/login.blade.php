@extends ('admin.template.main')

@section('title','GestEvent-Login')
@section('body_class','gestevent_login')
@section('main_class','gestevent_login')
@section('content')
<div class="jumbotron">
  <div class="container">
    <h1 class="text-center">Iniciar Sesión</h1>
    {!! Form::open(array('route' => 'auth.login','method' => 'POST','class'=>'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('email', 'E-mail:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'example@company.com','required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Contraseña:',['class'=>'col-xs-12 col-sm-2 col-md-4 control-label']) !!}
					<div class="col-xs-12 col-sm-10 col-md-5">
						{!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password','required']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8">
						{!! Form::submit('Login',['class'=>'btn btn-primary']) !!}
						{!! Form::reset('Cancelar',['class'=>'btn btn-default']) !!}
					</div>
				</div>
				{!! Form::close() !!}
  </div>
</div>
  <div class="row">
  	<div class="col-md-2">
  		<h6 class="text-center"><b>Email:</b> admin@gmail.com </h6>
  		<h6 class="text-center"><b>Contraseña:</b> admin </h6>
  	</div>
  	<div class="col-md-2">
  		<h6 class="text-center"><b>Email:</b> recepcionista@gmail.com </h6>
  		<h6 class="text-center"><b>Contraseña:</b> recepcionista </h6>
  	</div>
  	<div class="col-md-2">
  		<h6 class="text-center"><b>Email:</b> planificador@gmail.com </h6>
  		<h6 class="text-center"><b>Contraseña:</b> planificador </h6>
  	</div>
  	<div class="col-md-2">
  		<h6 class="text-center"><b>Email:</b> coordinador@gmail.com </h6>
  		<h6 class="text-center"><b>Contraseña:</b> coordinador </h6>
  	</div>
  	<!--<div class="col-md-2">
  		<h6 class="text-center"><b>Email:</b> empleado@gmail.com </h6>
  		<h6 class="text-center"><b>Contraseña:</b> empleado </h6>
  	</div>
  	<div class="col-md-2">
  		<h6 class="text-center"><b>Email:</b> cliente@gmail.com </h6>
  		<h6 class="text-center"><b>Contraseña:</b> cliente </h6>
  	</div>-->
  	<div class="col-md-2">
  		<h6 class="text-center"><b>Email:</b> gerente@gmail.com </h6>
  		<h6 class="text-center"><b>Contraseña:</b> gerente </h6>
  	</div>
  </div>
@endsection