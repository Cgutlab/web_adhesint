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
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body>
@include('page.template.header')

@foreach($servcontenido as $servcontenido)
<div class="container cero yp35 center-align" style="width: 82%;">
<div class="tituloRojo Lato fs36">
{{$servcontenido->titulo}}
<div align="center">
<div class="pemLinearojiz1"></div>
</div>
</div>
</div>

<div class="container cero yp35" style="width: 82%;" align="center">
<div class="Lato fs16 editorRico gris8" style="width: 70%;">
{!!$servcontenido->texto!!}
</div>
</div>
@endforeach

<div class="container yp35" align="center" style="width: 85%; padding: 10px 0 50px 0;">
<div class="row">
@foreach($servdestacados as $servdestacado)
<div class="col m6 l3 s12" style="position: relative;" style="padding-bottom: 50px;">
  <div class="card z-depth-0 yp35">
    <div style="margin: 20px 10px; border-radius: 50%; border: 2px solid #2A4585; width: 125px; height: 125px; vertical-align: middle; ">
    <img src="{{asset('imagenes/servdestacados/'.$servdestacado->imagen)}}" style="margin: 15px; width: 75px; height: 75px;">
    </div>
    <div class="card-content cero" style="padding: 0; height: 60px;">
      <div class="Raleway fw6 fs19 gris9 editorRico center-align ctitulos">{!!($servdestacado->titulo)!!}</div>
      <div class="Raleway fw4 fs17 gris12 editorRico yp10">{!!($servdestacado->texto)!!}</div>
    </div>
  </div>
</div>
@endforeach
</div>
</div>


<div class="container" align="center" style="width: 85%; padding: 50px 0 50px 0;">
<div class="row">

@foreach($servitems as $servitem)
@if($cont===0)
<div class="col s12 m12">
  <div class="card horizontal" style="margin-bottom: -7px; padding: 15px; ">
    <div class="card-image hide-on-small-and-down">
      <img src="{{asset('imagenes/servitems/'.$servitem->imagen)}}" style="height:240px; width:540px;">
    </div>
    <div class="card-stacked" style="background: #F5F5F5;">
      <div class="card-content">
        <p style="margin-bottom: 10px;"><b>{!!($servitem->titulo)!!}</b></p>
        <p>{!!($servitem->texto)!!}</p>
      </div>
    </div>
  </div>
</div>
<?php
$cont++;
?>
@else

<div class="col s12 m12">
  <div class="card horizontal"  style="margin-bottom: -7px; padding: 15px;">
    <div class="card-stacked" style="background: #F5F5F5;">
      <div class="card-content">
        <p style="margin-bottom: 10px;"><b>{!!($servitem->titulo)!!}</b></p>
        <p>{!!($servitem->texto)!!}</p>
      </div>
    </div>
    <div class="card-image hide-on-small-and-down">
      <img src="{{asset('imagenes/servitems/'.$servitem->imagen)}}" style="height:240px; width:540px;">
    </div>
  </div>
</div>
<?php
$cont=0;
?>
@endif
@endforeach

</div>
</div>







@include('page.template.footer')

	<script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>
    <script type="text/javascript">

	  $(document).ready(function(){
        $('.slider').slider();

    });
      
    </script>
</body>
</html>
<script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>

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
