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
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body>
@include('page.template.header')


<div class="container cero yp35" style="width: 82%;">
<div class="tituloRojo Lato fs36">
Clientes
<div class="pemLinearojiz1"></div>
</div>
</div>

<div class="container cero yp35" style="width: 82%;">
<div class="Lato fs16 editorRico gris8" style="width: 75%;">
Nuestro objetivo es satisfacer las necesidades de nuestros clientes. Estos son algunos de los clientes que confían en nosotros.
</div>
</div>

<div class="container cero yp35" style="width: 84%;">
<div class="row">
@foreach($clientes as $cliente)
<div class="col m12 l2" style="position: relative;">
  <div class="card z-depth-0">
    <div class="card-image center-align">
    {{-- <a href="#" class="naranja fs20 mayus">
        <div class="efecto">
            <span class="central Lato fs14"><i class="material-icons">add</i>Ingresar</span>
        </div> --}}
        <img src="{{asset('imagenes/clientes/'.$cliente->imagen)}}" style="border: 1px solid #DDD; max-width: 100%; max-height: 100%;">
    {{-- </a> --}}
    </div>  
    <div class="card-content cero" style="padding: 0; height: 60px;">
      <div class="Lato fw6 fs15 gris9 editorRico center-align" style="margin: 10px;">{!!($cliente->titulo)!!}</div>
{{--       <div class="Lato fw4 fs17 gris12 editorRico yp10">{!!($cliente->texto)!!}</div> --}}
    </div>
  </div>
</div>
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
