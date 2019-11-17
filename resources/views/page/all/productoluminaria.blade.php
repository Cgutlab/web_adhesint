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
<div class="hide-on-med-and-down cero" {{-- style="background: #EBEBEB; border-bottom: 1px solid #DDDDDD;" --}}>
  <div class="container cero" style="width: 82%;">  
    <div class="row cero">
      <div class="gris14 fw5 fs17 cero" style="padding: 25px 0 5px 10px;">    
      @foreach($categorias as $categoria)
      @if($categoria->id == $category->id)
      <a href="{{route('luminaria', $categoria->id)}}" class="Roboto gris14">
      {{($categoria->titulo)}}
      </a> 
       | 
      @if($producto->id_categorias_luminarias == $category->id)
      <a href="{{route('productol', $producto->id)}}" class="Roboto gris14">
      {{strtoupper($producto->titulo)}}
      </a> 
      @endif
      @endif
      @endforeach
      </div>
    </div>  
  </div>
</div>


<div class="yp35" style="padding-bottom: 150px;">
<div class="container" style="width: 82%;">
<div class="row cero">
  <div class="col l3 m12">

  <div style="width: 80%;">
    @foreach($categorias as $categoria)
    @if($categoria->id == $category->id)
    <div class="row">
      <a href="{{route('luminaria', $categoria->id)}}">
      <div class="col l12 m6">
        <div class="sublineaNegro1 orang1 fs15 fw7 Roboto">
            {{strtoupper($categoria->titulo)}}
          <aside class="right">
            <img src="{{asset('imagenes/help/arrowDown.png')}}">  
          </aside>
        </div>
      </div>
      </a>       
    </div>
    <div class="row">
      <div class="col l12 m6">

      @foreach($productos as $producto)
      @if($producto->id_categorias_luminarias == $category->id)
        <a href="{{route('productol', $producto->id)}}">

        @if($producto->id == $productoI->id)
        <div class="orang1 fs14 fw6 Roboto">
        @else
        <div class="gris12 fs14 fw5 Roboto">
        @endif

        &nbsp;&nbsp;{{($producto->titulo)}}   

        </div>
        </a>
      @endif
      @endforeach

      </div>
    </div>
    @else
    <div class="row">
      <a href="{{route('luminaria', $categoria->id)}}">
      <div class="col l12 m6">
        <div class="sublineaNaranja gris14 fw7 Roboto">
            {{strtoupper($categoria->titulo)}}
          <aside class="right">
            <img src="{{asset('imagenes/help/arrowEste.png')}}">        
          </aside>
        </div>
      </div>
      </a>       
    </div>
    @endif
    @endforeach
  </div>
  </div>
  <div class="col l9">


  
  <div class="container" style="width: 100%;">
    <div class="row">
      <div class="col l5">
        <div class="col l12 img-responsive" id="imagen-grande" style="width: 98%; height: 280px; margin: 0 0 0 0; padding: 0;">
          {{-- <a href="#" id="enlace" data-fancybox="images"> --}}

            <img id="imgDisp" src="{{asset('imagenes/productoluminaria/'.$productoI->imagen)}}" style="width: 100%; height: 100%; border:1px solid #DDDDDD;">           

          {{-- </a> --}}
        </div>
        <div class="col l12" style="width: 100%; height: 32%; margin: 5px 0 0 0; padding: 0;">     
            @if($productoI->imagen!=null)
              <img id="imgName" onclick="changeImage('{{asset('imagenes/productoluminaria/'.$productoI->imagen)}}')" src="{{asset('imagenes/productoluminaria/'.$productoI->imagen)}}"  style="height: 100px;width: 32%; border:1px solid #DDDDDD; margin: 0px;" {{-- onClick="javascript: verImagenEnGrande('{{asset('imagenes/productos/'.$productoI->imagen)}}');" --}}>
            @endif
            @if($productoI->imagen1!=null)
              <img id="imgName" onclick="changeImage('{{asset('imagenes/productoluminaria/'.$productoI->imagen1)}}')" src="{{asset('imagenes/productoluminaria/'.$productoI->imagen1)}}" style="height: 100px;width: 32%; border:1px solid #DDDDDD; margin: 0px;" {{-- onClick="javascript: verImagenEnGrande('{{asset('imagenes/productos/'.$productoI->imagen1)}}');" --}}>
            @endif
            @if($productoI->imagen2!=null)
              <img id="imgName" onclick="changeImage('{{asset('imagenes/productoluminaria/'.$productoI->imagen2)}}')" src="{{asset('imagenes/productoluminaria/'.$productoI->imagen2)}}" style="height: 100px;width: 32%; border:1px solid #DDDDDD; margin: 0px;" {{-- onClick="javascript: verImagenEnGrande('{{asset('imagenes/productos/'.$productoI->imagen2)}}');" --}}>     
            @endif
        </div>
      </div>
      <div class="col l7">
      <div class="container" style="width: 95%">
        <div style="color: #DE1F06;"><h5 style="margin-top: 0px; font-weight: 600;">{{($productoI->titulo)}}</h5></div>
        <div class="pemLinearojiz1"></div>
        <div style="color: #DE1F06;"><h6>{!!($productoI->texto)!!}</h6></div>
        <div>{!!($productoI->resena)!!}</div>
        <div>
          @if($productoI->descripcion!=null)
          <div class="descripcion" align="center"><img src="{{asset('imagenes/productoluminaria/'.$productoI->descripcion)}}" class="img-responsive center"></div>
          @endif
          @if($productoI->ficha!=null)
          <a href="{{asset('imagenes/productoluminaria/'.$productoI->ficha)}}" class="btn btn-ficha" style="background: #DE1F06; font-family: 'Raleway'; font-weight: 600; width: 200px;
/*border-radius: 5px 5px 5px 5px;
-moz-border-radius: 5px 5px 5px 5px;
-webkit-border-radius: 5px 5px 5px 5px;*/" target="_blank">Descargar Ficha PDF</a>
          @endif
        </div>
      </div>
      </div>
    </div>
    <div class="container editorRico" style="width: 100%;">
      {!!($productoI->texto1)!!}
    </div>
    <div class="container" style="width: 100%;">
    <div class="row">
    <div class="col l5"><img src="{{asset('imagenes/productoluminaria/'.$productoI->dibujo)}}" class="img-responsive center"></div>
    <div class="col l5"><img src="{{asset('imagenes/productoluminaria/'.$productoI->dibujo1)}}" class="img-responsive center"></div>
    </div>
    </div>
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
function changeImage(imgName)
{
  image = document.getElementById('imgDisp');
  image.src = imgName;
}
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
