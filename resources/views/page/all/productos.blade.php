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

<div class="container yp35" align="center" style="width: 88%">
  <div class="tituloRojo Raleway fs32 fw6" style="margin-bottom: 0px;">
  @foreach($productos as $producto)
  @if($producto->seccion == 1)  Alambrados  @break  @endif
  @if($producto->seccion == 2)  Puertas y Portones  @break @endif
  @if($producto->seccion == 3)  Postes  @break @endif
  @if($producto->seccion == 4)  Otros Productos  @break  @endif
  @endforeach
  <div class="pemLinearojiz1"></div>
  </div>
</div>

<div class="container" style="width: 83%; padding: 70px 0 70px 0;">
<div class="row">
@foreach($productos as $producto)
<div class="col s12 m6 l3">
  <div class="card z-depth-0">
    <div class="card-image center-align">
    <a href="{{url('producto/'.$producto->id)}}" class="naranja fs20 mayus">
        <div class="efecto">
            {{-- <span class="central Raleway fs14"><i class="material-icons">add</i>Ingresar</span> --}}
            <div class="central" style="background-color: #D31B22; color:white; padding: 1px; width: 139px; height: 37px; border-radius: 0px;">              
              <div class="center-align fw7 fs18" style="padding-top: 3px;">INGRESAR</div>
            </div>
        </div>
        <img src="{{asset('imagenes/productoalambrados/'.$producto->imagen)}}" style="border: 1px solid #DDD; height: 260px;">
    </a>
    </div>
    <div class="card-content cero center-align Roboto" style="height: 100px; padding-top: 12px;">
      <div class="Roboto fw5 fs19 ctitulo2 editorRico">{!!($producto->titulo)!!}</div>
    </div>
  </div>
</div>
@endforeach
</div>
</div>


@include('page.template.footer')
</body>
</html>


    <script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
