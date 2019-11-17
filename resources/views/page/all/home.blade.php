<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Alambrados Prix</title>
	<link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/materialize/materialize.min.css') }}" rel="stylesheet">

    <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body>
@include('page.template.header')

{{-- Slider --}}
<div class="slider hide-on-med-and-down">
    <ul class="slides">
        @foreach($sliders as $slider)
            <li>
                <img src="{{ asset('imagenes/sliders/'.$slider->imagen) }}" style="filter:brightness(1);">               
                <div class="caption center-align" style="background: rgba(211,27,34,0.7); ">
                    <div style="margin: 25px; padding: 25px;">                      
                      <span class="editorRico blanc1 fw6 Raleway" style="font-size: 48px;line-height: 51px;">{!!$slider->titulo!!}</span>
                      <span class="editorRico blanc1 fw4 Raleway" style="font-size: 32px;line-height: 41px;">{!!$slider->subtitulo!!}</span>
                      <div align="center">
                      <div class="medLineablanca1 yp15" style="margin-bottom: 25px;"></div>                      
                      </div>
                    </div>
                </div>     
            </li>
        @endforeach
    </ul>
</div>


{{-- Servicios --}}
{{-- <div class="container" align="center" style="width: 85%; padding: 10px 0 50px 0;">
<div class="row">
@foreach($servicios as $servicio)
<div class="col m6 l3 s12" style="position: relative;" style="padding-bottom: 50px;">
  <div class="card z-depth-0">
    <div style="margin: 20px 10px; border-radius: 50%; border: 2px solid #2A4585; width: 125px; height: 125px; vertical-align: middle; ">
    <img src="{{asset('imagenes/servdestacados/'.$servicio->imagen)}}" style="margin: 15px; width: 75px; height: 75px;">
    </div>
    <div class="card-content cero" style="padding: 0; height: 60px;">
      <div class="Raleway fw6 fs19 gris9 editorRico center-align ctitulos">{!!($servicio->titulo)!!}</div>
      <div class="Raleway fw4 fs17 gris12 editorRico yp10">{!!($servicio->texto)!!}</div>
    </div>
  </div>
</div>
@endforeach
</div>
</div> --}}

<div class="container yp35 hide-on-med-and-down" style="width: 20%;">
<div align="center">
<a href="#!">
  <div style="background-color: white; border: 2px solid #D31B22; color:#D31B22; padding: 7px; width: 290px; border-radius: 10px;">              
    <div class="Lato fw6 fs16" style="letter-spacing: 2px;">INGRESAR A SERVICIOS</div>             
  </div>
</a>
</div>
</div>


{{-- Contenido --}}
<div class="ym60 yp35 bannerImage" align="center">
@foreach($contenidos as $contenido)
<div class="container bannerTexto">
<div class="row">
<div class="col l6">
  <div class="ctitulo2 Raleway fs25 editorRico">
  {!!$contenido->titulo!!}
  </div>
</div>
<div class="col l6">
  <div class="gris10 Raleway fs17 editorRico">
  {!!$contenido->texto!!}
  </div>
</div>
</div>
</div>
@endforeach

</div>
{{-- Destacados --}}
<div class="container yp35" align="center" style="width: 88%">
  <div class="tituloRojo Raleway fs32 fw6" style="margin-bottom: 0px;">
  Productos Destacados
  <div class="pemLinearojiz1"></div>
  </div>
</div>

<div class="container" align="center" style="width: 60%; padding: 50px 0 50px 0;">
<div class="row">
@foreach($destacados as $destacado)
<div class="col m12 s12 l4" style="position: relative;">
  <div class="card z-depth-0">
    <div class="card-image center-align">
    <a href="{{($destacado->ruta)}}" class="naranja fs20 mayus">
        <div class="efecto">
            {{-- <span class="central Raleway fs14"><i class="material-icons">add</i>Ingresar</span> --}}
            <div class="central" style="background-color: #D31B22; color:white; padding: 1px; width: 139px; height: 37px; border-radius: 4px;">              
              <div class="center-align fw7 fs18" style="padding-top: 3px;">INGRESAR</div>
            </div>
        </div>
        <img src="{{asset('imagenes/destacados/'.$destacado->imagen)}}" style="border: 1px solid #DDD; height: 260px;">
    </a>
    </div>
    <div class="card-content cero" style="padding: 0;">
      <div class="Raleway fw4 fs18 gris9 editorRico center-align" style="margin: 7px;">{!!($destacado->titulo)!!}</div>
{{--  <div class="Raleway fw4 fs17 gris12 editorRico yp10">{!!($destacado->texto)!!}</div> --}}
    </div>
  </div>
</div>
@endforeach
</div>
</div>
{{-- 
<div class="container" style="width: 88%">
<div class="tituloRojo Raleway fs36" style="margin-bottom: 0px;">
C&oacute;mo Trabajamos
<div class="peqLinearojiz1"></div>
</div>
</div>

<div class="container" style="width: 90%; padding: 30px 0 0px 0;">
<div class="row">
@foreach($trabajamos as $trabajamo)
  <div class="col m6 l3" style="position: relative;">
    <div class="card white z-depth-0 ">
        <div class="row">
        <div class="col l2">
          <img src="{{('imagenes/trabajamos/'.$trabajamo->imagen)}}">
        </div>
        <div class="col l10">
          <div class="Raleway fw7 fs18 gris9" style="padding-left: 8px;">{{($trabajamo->titulo)}}</div>
          <div class="Raleway fw5 fs18 rojiz1" style="padding-left: 8px;">{{($trabajamo->subtitulo)}}</div>
        </div>
        </div>
        <div class="Raleway fw5 fs16 gris9" style="height: 150px; max-width: 80%;">
        {!!($trabajamo->texto)!!}          
        </div>
      </div>
  </div>
@endforeach
</div>
</div>


<div class="slider hide-on-med-and-down">
<ul class="slides">
@foreach($banners as $banner)        
<li>
    <img src="{{ asset('imagenes/bannercontenidos/bannercontenidos__bannerHome.jpg') }}" style="filter:brightness(1);">               
    <div class="caption" style="left: 7%; background: rgba(58,58,59,0); width: 88%; border-top: 35px;">
        <div class="row">
          <div class="col l4">
            <span class="editorRico blanc1 fw3 Raleway" style="font-size: 38px;">{!!$banner->titulo!!}</span>
            <span class="editorRico blanc1 fw3 Source" style="font-size: 16px;">{!!$banner->texto!!}</span>  
          </div>
          <div class="offset-l1 col l7">
          <div class="row">
          @foreach($bannersIconos as $bannersicon)

          <div class="col l6" style="margin-top: 3%;">
          <div class="row">
          <div class="col l4">
            <img src="{{ asset('imagenes/bannericonos/'.$bannersicon->imagen) }}" style="filter:brightness(1); width: 85px; height: 85px;">
          </div>
          <div class="col l8">
            <span class="fs25">{!!($bannersicon->titulo)!!} </span>
          </div>
          </div>
          </div>

          @endforeach
          </div>
          </div>
        </div>
    </div>  
</li>
@endforeach
</ul>
</div>
 --}}

@include('page.template.footer')

</body>
</html>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>

<script>
  $(document).ready(function(){
  $('.slider').slider();
  });
</script>

<script type="text/javascript">
 $(document).ready(function(){
  $('.dropdown-trigger').dropdown({
    constrainWidth: false,
    closeOnClick: false,
    fullWidth: false,
    hover: 1,
  });
   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
