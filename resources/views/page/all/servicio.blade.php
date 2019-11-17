<!DOCTYPE html>
<html lang="es">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Indomatrix</title>

</head>
<body>
	<link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/materialize/materialize.min.css') }}" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,800" rel="stylesheet">
  <link rel="icon" href="{{ asset('imagenes/logos/logos__favicon.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('imagenes/logos/logos__favicon.png') }}" type="image/x-icon">

@include('page.template.header')

<h4 align="center" style="font-family: 'Raleway'; color:#393185; margin:50px;"><b>Lista de Precios</b></h4>
<div class="container" style="max-width: 900px; margin-bottom: 20px; ">
    <ul class="flex-container" style="display: flex; align-content: space-between;">
      @foreach($servicios as $servicio)
      @if($servicio->imagen != null)
      @if($servicio->titulo != null)
          <li class="flex-item" style="width: 230px; height: 10%;">            
              <div style="padding: 0px; border: 1px solid #B0B0B0; border-bottom: 5px solid #01A0E2; background: white;">
                <div style="padding:50px 0 0 0; margin:0 0 -40px 0;">
                  <a href="{{asset('imagenes/servicio/'.$servicio->imagen)}}" target="_blank">
                  <img src="{{('imagenes/help/download.png')}}" style="height: 60px; width: 60px;">
                  </a>
                </div>
                <div>
                  
                <h2 style="font-family: 'Lato'; font-size: 19px; color: #444444; padding: 0; line-height: 25px; margin: 10px 10px 30px 10px;">{{$servicio->titulo}}</h2>
                </div>
              </div>            
          </li>
      @endif    
      @endif
      @endforeach
    </ul>
</div>

@include('page.template.footer')
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
