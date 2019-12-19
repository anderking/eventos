@extends ('admin.template.main')

@section('title','GestEvent')
@section('body_class','gestevent')
@section('main_class','gestevent')

@section('style')
<style>

</style>
@endsection

@section('content')
<div class="jumbotron hidden-sm hidden-md hidden-lg">
  <div class="container">
    <h1>Aplicación de Laravel 5.1</h1>
    <p>LaravelSocialite es un sistema de blog/red social donde puedes rellenar tu perfil, publicar artículos de texto e imágenes, interactuar con los usuarios dándole like a sus artículos, comentarlos  entre otras cosas. Únete y prueba este blog social.</p>
    <a href="{{ route('auth.login') }}" class="btn btn-default">Login</a>
  </div>
</div>

<section id="slider" class="hidden-xs">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="carrusel-rds" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" >
            <div class="item active">
              <img
              class="img-responsive"
              src="{{asset('plugins/img/')}}/evento1.jpg"
              title="Title"
              alt="Slider"
              />
              <div class="carousel-caption">
                <!--<h2>Eventos</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi vitae cupiditate ex explicabo unde, iusto quia nam! Officiis ipsam recusandae, non accusamus aperiam sunt ab quis quaerat, cum itaque.</h3>-->
              </div>
            </div>
            <div class="item">
              <img
              class="img-responsive"
              src="{{asset('plugins/img/')}}/evento2.jpg"
              title="Title"
              alt="Slider"
              />
              <div class="carousel-caption">
                <h2>Bodas</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi vitae cupiditate ex explicabo unde, iusto quia nam! Officiis ipsam recusandae, non accusamus aperiam sunt ab quis quaerat, cum itaque.</h3>
              </div>
            </div>
            <div class="item">
              <img
              class="img-responsive"
              src="{{asset('plugins/img/')}}/evento3.jpg"
              title="Title"
              alt="Slider"
              />
              <div class="carousel-caption">
                <h2>Cumpleaños</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi vitae cupiditate ex explicabo unde, iusto quia nam! Officiis ipsam recusandae, non accusamus aperiam sunt ab quis quaerat, cum itaque.</h3>
              </div>
            </div>
            <div class="item">
              <img
              class="img-responsive"
              src="{{asset('plugins/img/')}}/evento4.jpg"
              title="Title"
              alt="Slider"
              />
              <div class="carousel-caption">
                <h2>Sociales</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi vitae cupiditate ex explicabo unde, iusto quia nam! Officiis ipsam recusandae, non accusamus aperiam sunt ab quis quaerat, cum itaque.</h3>
              </div>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#carrusel-rds" data-slide="prev">
          <span class="fa fa-arrow-left" aria-hidden="true"></span>
          <span></span>
        </a>
        <a class="right carousel-control" href="#carrusel-rds" data-slide="next">
          <span class="fa fa-arrow-right" aria-hidden="true"></span>
          <span></span>
        </a>
      </div>
    </div>
  </div>
</div>
</section>

@endsection