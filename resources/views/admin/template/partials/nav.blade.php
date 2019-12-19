@if(Auth::user()) 

@if(Auth::user()->admin())

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left" >
          <li class="{{ active(['admin.home.index','admin.config.index']) }}"><a href="{{ route('admin.home.index') }}">Home</a></li>
          <li class="{{ active('admin.tiposervicios.*') }}"><a href="{{ route('admin.tiposervicios.index') }}">Tipo Sirvicios</a></li>
          <li class="{{ active('admin.servicios.*') }}"><a href="{{ route('admin.servicios.index') }}">Servicios</a></li>
          <li class="{{ active('admin.items.*') }}"><a href="{{ route('admin.items.index') }}">Items</a></li>
          <li class="{{ active('admin.proveedores.*') }}"><a href="{{ route('admin.proveedores.index') }}">Proveedores</a></li>
          <li class="{{ active('admin.costos.*') }}"><a href="{{ route('admin.costos.index') }}">Costos</a></li>
          <li class="{{ active('admin.tipolocales.*') }}"><a href="{{ route('admin.tipolocales.index') }}">Tipo Locales</a></li>
          <li class="{{ active('admin.locales.*') }}"><a href="{{ route('admin.locales.index') }}">Locales</a></li>
          <li class="{{ active('admin.tipoeventos.*') }}"><a href="{{ route('admin.tipoeventos.index') }}">Tipo Evento</a></li>
          <li class="{{ active('admin.tipocomites.*') }}"><a href="{{ route('admin.tipocomites.index') }}">Tipo Comités</a></li>
          <li class="{{ active('admin.comites.*') }}"><a href="{{ route('admin.comites.index') }}">Comite</a></li>
          <li class="{{ active('admin.roles.*') }}"><a href="{{ route('admin.roles.index') }}">Rol</a></li>
          <li class="{{ active('admin.users.*') }}"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-xs"><a href="{{ route('auth.logout')}}">Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
  </nav>

@elseif(Auth::user()->recepcionista())

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left" >
          <li class="{{ active(['recepcionista.home.index','recepcionista.configrecep.index']) }}"><a href="{{ route('recepcionista.home.index') }}">Home</a></li>
          <li class="{{ active('recepcionista.clientes.*') }}"><a href="{{ route('recepcionista.clientes.index') }}">Clientes</a></li>
          <li class="{{ active('recepcionista.cotizaciones.*') }}"><a href="{{ route('recepcionista.cotizaciones.index') }}">Cotizaciones</a></li>
          <li class="{{ active('recepcionista.eventos.*') }}"><a href="{{ route('recepcionista.eventos.index') }}">Eventos</a></li>
          <li class="{{ active('recepcionista.pagos.*') }}"><a href="{{ route('recepcionista.pagos.index') }}">Pagos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-xs"><a href="{{ route('auth.logout')}}">Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
  </nav>

@elseif(Auth::user()->planificador())

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left" >
          <li class="{{ active('planificador.home.index') }}"><a href="{{ route('planificador.home.index') }}">Home</a></li>
          <li class="{{ active('planificador.listaeventos.*') }}"><a href="{{ route('planificador.listaeventos.index') }}">Planificar Eventos </a></li>
          <li class="{{ active('planificador.tipotareas.*') }}"><a href="{{ route('planificador.tipotareas.index') }}">Tipo Tarea</a></li>
          <li class="{{ active('planificador.tareas.*') }}"><a href="{{ route('planificador.tareas.index') }}">Tareas</a></li>
          <li class="{{ active('planificador.eventotareas.*') }}"><a href="{{ route('planificador.eventotareas.index') }}">Planificar Tareas</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-xs"><a href="{{ route('auth.logout')}}">Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
  </nav>

@elseif(Auth::user()->coordinador())

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left" >
          <li class="{{ active('coordinador.home.index') }}"><a href="{{ route('coordinador.home.index') }}">Home</a></li>
          <li class="{{ active('coordinador.designacioncomites.*') }}"><a href="{{ route('coordinador.designacioncomites.index') }}">Designar Comites</a></li>
          <li class="{{ active('coordinador.listatareas.*') }}"><a href="{{ route('coordinador.listatareas.index') }}">Lista de Tareas</a></li>
          <li class="{{ active('coordinador.designaciontareas.*') }}"><a href="{{ route('coordinador.designaciontareas.index') }}">Asignar Tareas</a></li>
          <li class="{{ active('coordinador.incidencias.*') }}"><a href="{{ route('coordinador.incidencias.index') }}">Incidencias</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-xs"><a href="{{ route('auth.logout')}}">Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
  </nav>

@elseif(Auth::user()->gerente())

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left" >
          <li class="{{ active('gerente.home.index') }}"><a href="{{ route('gerente.home.index') }}">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-xs"><a href="{{ route('auth.logout')}}">Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
  </nav>

@endif

@else

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar-brand-gestevent" href="{{ url('/') }}">GestEvent</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right" >
        <li class="{{ active('auth.login') }}"><a href="{{ route('auth.login') }}" >Login</a></li>
      </ul>
    </div>
  </div>
</nav>

@endif