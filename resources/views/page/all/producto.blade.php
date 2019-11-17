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

  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body>
@include('page.template.header')


<div class="container" style="width: 80%; font-family: 'Raleway';">
     
<div class="row" style="margin-top: 30px;">
  <div class="col l12" style="padding-bottom: 50px; padding-left: 0px; font-family: 'Raleway'; font-weight: 500; letter-spacing: 0.7px;">
    <a href="{{url('productos/'.$productoIs->seccion)}}" style="color: #3F3F3F;" >
    {{('PRODUCTOS')}}</a> &nbsp;|&nbsp; {{($productoIs->titulo)}}
  </div>
  <div class="col l3 hide-on-med-and-down" style="border-top: 1px solid #01A0E2">
    <p>
      @foreach($productos as $producto)
      @if($producto->imagen!=null)
      @if($producto->seccion == $productoIs->seccion)
        <div style="margin-bottom: 10px;">
          <a href="{{($producto->id)}}">
            <span style="color: #4B4B4B; font-family: 'Raleway'; font-size: 16px; font-weight: 600;">              
              @if(($producto->id) == ($productoIs->id))
              <span style="font-weight: 800;">
                {{($producto->titulo)}}
              </span>
              @else
              {{($producto->titulo)}}
              @endif
            </span><br>
            <span style="color: #A4A4A4;">
              @if(($producto->id) == ($productoIs->id))
              <span style="color: gray; font-weight: 600;">
                {{($producto->breve)}}
              </span>
              @else
              {{($producto->breve)}}
              @endif
              
            </span>
          </a>
        </div> 
      @endif
      @endif
      @endforeach
    </p>
  </div>
  <div class="col l9">
  <div class="container" style="width: 95%;">
    <div class="row">
      <div class="col l5">
        <div class="col l12 img-responsive" id="imagen-grande" style="width: 98%; height: 280px; margin: 0 0 0 0; padding: 0;">
          {{-- <a href="#" id="enlace" data-fancybox="images"> --}}

            <img id="imgDisp" src="{{asset('imagenes/productoalambrados/'.$productoIs->imagen)}}" style="width: 100%; height: 100%; border:1px solid #DDDDDD;">           

          {{-- </a> --}}
        </div>
        <div class="col l12" style="width: 100%; height: 32%; margin: 5px 0 0 0; padding: 0;">     
            @if($productoIs->imagen!=null)
              <img id="imgName" onclick="changeImage('{{asset('imagenes/productoalambrados/'.$productoIs->imagen)}}')" src="{{asset('imagenes/productoalambrados/'.$productoIs->imagen)}}"  style="height: 100px;width: 32%; border:1px solid #DDDDDD; margin: 0px;" {{-- onClick="javascript: verImagenEnGrande('{{asset('imagenes/productoalambrados/'.$productoIs->imagen)}}');" --}}>
            @endif
            @if($productoIs->imagen1!=null)
              <img id="imgName" onclick="changeImage('{{asset('imagenes/productoalambrados/'.$productoIs->imagen1)}}')" src="{{asset('imagenes/productoalambrados/'.$productoIs->imagen1)}}" style="height: 100px;width: 32%; border:1px solid #DDDDDD; margin: 0px;" {{-- onClick="javascript: verImagenEnGrande('{{asset('imagenes/productoalambrados/'.$productoIs->imagen1)}}');" --}}>
            @endif
            @if($productoIs->imagen2!=null)
              <img id="imgName" onclick="changeImage('{{asset('imagenes/productoalambrados/'.$productoIs->imagen2)}}')" src="{{asset('imagenes/productoalambrados/'.$productoIs->imagen2)}}" style="height: 100px;width: 32%; border:1px solid #DDDDDD; margin: 0px;" {{-- onClick="javascript: verImagenEnGrande('{{asset('imagenes/productoalambrados/'.$productoIs->imagen2)}}');" --}}>     
            @endif
        </div>
      </div>
      <div class="col l7">
      <div class="container" style="width: 95%">
        <div style="color: #393185;"><h5 style="margin-top: 0px; font-weight: 600;  line-height: 35px;">{{($productoIs->titulo)}}</h5></div>
        <div style="color: #393185;"><h6 style="font-weight: 600;">{{($productoIs->breve)}}</h6></div>
        <div class="Raleway fs19 fw4 gris10" style="padding-bottom: 20px;">{!!($productoIs->texto)!!}</div>
        <div>

          @if($productoIs->ficha!=null)
          <a href="{{asset('imagenes/productoalambrados/'.$productoIs->ficha)}}" class="btn btn-ficha z-depth-0 " style="background: white; color:#D30000; font-family: 'Raleway'; font-weight: 600; width: 260px; height: 42px; padding: 0px; border: 3px solid #D30000; margin-top: 10px;" target="_blank">VER CATÁLOGO</a>
          @endif
          <a href="{{asset('imagenes/productoalambrados/'.$productoIs->ficha)}}" class="btn btn-ficha z-depth-0 " style="background: white; color:#D30000; font-family: 'Raleway'; font-weight: 600; width: 260px; height: 42px; padding: 0px; border: 3px solid #D30000; margin-top: 10px;" target="_blank">SOLICITAR PRESUPUESTO</a>
        </div>
      </div>
      </div>
    </div>
    <div class="container" style="width: 100%;">
      <div class="Raleway fs19 fw4 gris10" style="padding-bottom: 20px;">{!!($productoIs->texto1)!!}</div>
    </div>
    </div>
  </div>
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
<script type="text/javascript">
function changeImage(imgName)
{
  image = document.getElementById('imgDisp');
  image.src = imgName;
}
</script>