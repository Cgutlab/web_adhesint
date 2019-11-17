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
<div class="hide-on-med-and-down cero" style="background: #EBEBEB;">
  <div class="container cero" style="width: 80%;">  
    <div class="row cero">
      <div class="verde1 fw7 fs20 cero Roboto" style="padding: 20px 0 20px 10px;">CALIDAD</div>
    </div>  
  </div>
</div>

<div class="ym60">
<div class="container" style="width: 80%;">
<div class="row">
  <div class="col l6 s12 left">
    <div class="Roboto fw3 gris12 fs17 cero" style="width: 92%;">
      {!!$calidad->descripcion!!}
    </div>
  </div>
  <div class="col l6 s12 right">
    @if($calidad->imagen != null)
    <img src="{{asset('imagenes/calidad/'.$calidad->imagen)}}">
    <div class="lineaVerde"></div>
    @endif
    <div class="Roboto fw5 verde1 fs24 cero">
      {!!$calidad->titulo!!}
    </div>
  </div>
</div>  
</div>
</div>


<div class="ym60">
<div class="container" style="width: 80%; padding-bottom: 70px;">
  <div class="row">
@foreach($descargas as $descarga)    
    <div class="col m12 l6">
      <div class="card bordes" style="width: 92%; box-shadow: none; background: #F2F2F2;">
        <div class="card-content">
          <div class="row cero" style="margin: 0;">
            <div class="col l10 m8 Roboto">
              <p class="Roboto separaletras gris16 fw4">{{$descarga->titulo}}</p>
              <p class="Roboto separaletras gris16 fw4">{{$descarga->subtitulo}}</p>              
            </div>
            <div class="col l2 m4" align="right">
            <a href="{{asset('imagenes/descargas/'.$descarga->imagen)}}">
            <img class="responsive-img" src="{{ asset('imagenes/help/download.png') }}">
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
  </div>
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
