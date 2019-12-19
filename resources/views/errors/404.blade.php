<!DOCTYPE html>
<html>
    <head>
        <title>404</title>

        <link rel="stylesheet" href="{{ asset('plugins/css/bootstrap-styles/bootstrap-style-10.css') }}">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <style>

            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .jumbotron{
                margin: 8em 0 ;
            }

        </style>
    </head>
    <body class="notfound">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="text-center">Oops! error 404</h1>
                        <h2 class="text-center">Page not found</h2>
                        <p>
                            @if(Auth::user())
                            @if(Auth::user()->admin())
                            <div class="text-center">
                                <a href="{{ route('admin.home.index') }}" class="btn btn-primary">Ir a Home</a>
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
                            </div>
                            @elseif(Auth::user()->recepcionista())
                            <div class="text-center">
                                <a href="{{ route('recepcionista.home.index') }}" class="btn btn-primary">Ir a Home</a>
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
                            </div>
                            @elseif(Auth::user()->planificador())
                            <div class="text-center">
                                <a href="{{ route('planificador.home.index') }}" class="btn btn-primary">Ir a Home</a>
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
                            </div>
                            @elseif(Auth::user()->coordinador())
                            <div class="text-center">
                                <a href="{{ route('coordinador.home.index') }}" class="btn btn-primary">Ir a Home</a>
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
                            </div>
                            @elseif(Auth::user()->gerente())
                            <div class="text-center">
                                <a href="{{ route('gerente.home.index') }}" class="btn btn-primary">Ir a Home</a>
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
                            </div>
                            @endif
                            @else
                            <div class="text-center"><a href="{{ url('/') }}" class="btn btn-primary">Regresar al inicio</a></div>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
