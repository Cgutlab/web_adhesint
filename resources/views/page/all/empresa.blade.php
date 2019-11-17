<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Indomatrix</title>
  <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/materialize/materialize.min.css') }}" rel="stylesheet">

    <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

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


{{-- CONTENIDO --}}
<div class="container ym60 yp35" style="width: 90%">
<div class="row Raleway">
  <div class="container" style="width: 98%">
    <div class="tituloRojo Raleway fs36 editorRico" style="margin-bottom: 0px;">
      {!!$empresa->titulo!!}
    <div class="pemLinearojiz1"></div>
    </div>
  </div>  
  <div class="col l6 right">
  <div class="hide-on-med-and-down">
    @if($empresa->imagen != null)
    <img class="responsive-img" src="{{asset('imagenes/empresa/'.$empresa->imagen)}}" style="max-height: 286px; max-width: 486px;">
    @endif
  </div>
  </div>
  <div class="col l6">
  <div  style="width: 98%;">
  <div class="ctitulo2 Raleway fw4 fs28 editorRico" style="margin-top: 15px;">{!!$empresa->titulo2!!}</div>
  <div class="gris7 editorRico fw4 fs15 Raleway gris12 Raleway" style="margin-top: 5px;">
    {!!$empresa->texto!!}
  </div>
  </div>
  </div>
</div>
</div>

{{-- Linea de Tiempo
<section class="timeline-section" style="padding-top: 50px;">
    <div id="timeline">
      <ul id="dates">
        @foreach($tiempos as $tiempo)
          <li><a href="#{{ $tiempo->titulo }}">{{ $tiempo->titulo }}</a></li>
        @endforeach
      </ul>
      
      <ul id="issues">
        @foreach($tiempos as $tiempo)
        <li id="{{ $tiempo->titulo }}">
          <div class="imglinea" align="center"><br>
          <div class="Raleway fs15 blanc1" style="width: 500px;">{!! $tiempo->texto !!}</div><br>
        @if($tiempo->imagen!=null)
          <div align="center" style="margin-left: 300px; margin-bottom: 50px;">            
          <img src="{{asset('imagenes/tiempos/'.$tiempo->imagen)}}" class="img-responsive" width="276px" style="max-height: 200px;">
          </div>
        @endif          
          </div>
        </li>
        @endforeach
      </ul>
          
    </div>
</section>

<div style="border-bottom: 1px solid #DDDDDD;">
<div class="container yp35" style="width: 88%; margin-bottom: 35px; ">
<div class="row">
@foreach($publicacions as $publicacion)
  <div class="col l6 editorRico">
  <div class="tituloRojo Raleway fs36 fw3" style="margin-bottom: 0px;">
  {!!($publicacion->titulo)!!}
  <div class="peqLinearojiz2"></div>
  </div>
  <div class="gris10 fs16 Raleway yp20 editorRico" style="width: 90%;">
  {!!($publicacion->texto)!!}
  </div>
  </div>
@endforeach
</div>
</div>
</div>

<div>
<div class="container" style="width: 88%; margin-bottom: 35px;">
<div class="row">
<div class="col l6">
  <div class="tituloRojo Raleway fs36 fw3" style="margin-bottom: 0px;">
  {!!$empresa->politica!!} 
  </div>
  <div class="gris10 fs16 Raleway" style="width: 90%;">
  {!!$empresa->descripcion!!} 
  </div>
</div>
<div class="col l6">
  <img class="yp35" src="{{asset('imagenes/empresa/'.$empresa->imagen2)}}" class="img-responsive">
</div>
</div>
</div>
</div>
--}}




</div>

@include('page.template.footer')


</body>
</html>

<script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.slider').slider();

});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>

<script type="text/javascript" src="http://osolelaravel.com/verion/js/jquery.timelinr-0.9.6.js"></script>
 
 <script>
    $(function(){
        $().timelinr({
            arrowKeys: 'true'
        })
    });
</script>
