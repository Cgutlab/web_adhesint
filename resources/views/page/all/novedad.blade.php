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
	<link href="https://fonts.googleapis.com/css?family=Lato:400,500,600,700,800" rel="stylesheet">
	<link rel="icon" href="{{ asset('imagenes/logos/logos__favicon.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('imagenes/logos/logos__favicon.png') }}" type="image/x-icon">
</head>
<body>
@include('page.template.header')

<div class="container" style="width: 82%; margin-top: 10px; margin-bottom: 120px;">
<div class="row">
  <div class="col l12">
@foreach($categorias as $categoria)
@if($categoria->id == $novedadI->id_categorias_novedads)
      <div style="margin-top: 15px; font-family: 'Lato'; color:#3F3F3F;">
        <a href="{{route('novedades')}}" style="font-size: 14; color: #3F3F3F;  font-weight: 500;">        
        {{('Novedades')}}
        </a> 
        &nbsp;|&nbsp;
          <a href="{{route('filter', $categoria->id)}}" style="font-size: 14; color: #3F3F3F; font-weight: 500;">{{($categoria->titulo)}}</a>
        @if($novedadI->titulo != '')
        &nbsp;|&nbsp;
        <span style="font-size: 14; color: #3F3F3F; font-weight: 500;">
        {{($novedadI->titulo)}}
        </span>
        @endif
    </div>
  </div>
</div>

<div class="row" style=" margin-top: 60px;">
  <div class="right col l3 m12 s12">
    <div class="hide-on-med-and-down">
      <nav class="z-depth-0" style="background-color: white; border: 1px solid #DDDDDD">
        <div class="nav-wrapper">
          {!!Form::open(['route'=>'buscar_novedad', 'method'=>'POST'])!!}
            <div style="padding-left: 10px; padding-right: 10px;">
              <div>{!!Form::text('buscar',null,['placeholder'=>'Buscar...', 'required'])!!}</div>            
              <div class="hide">{!!Form::submit('crear', ['class'=>'hidden'])!!}</div>
              <!-- <i class="material-icons">close</i> -->
            </div>
          {!!Form::close()!!} 
        </div>
      </nav>
    </div>
    <div style="padding-top: 40px; padding-bottom: 40px;">
      <div style="border-bottom: 2px solid #545456;">
        <h5 class="tituloRojo" style="padding-left: 5px; font-weight: 500; font-size: 20px;">CATEGOR&IacuteAS</h5>
      </div>
      <div style="padding-top: 15px;">
        @foreach($categorias as $categoria)
        <div style="padding-left: 5px;  font-size: 17px; padding-bottom: 10px; ">
          <a href="{{route('filter', $categoria->id)}}" style="color: #716E6E; font-family: 'Lato';">» &nbsp; {{($categoria->titulo)}}</a>
           
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="col l9">
      <div class="container left" style="width: 95%;">
          <div style="padding-left: 8px; font-family: 'Lato'; font-size: 14px; color: #434141; border-top: 1px solid #DDDDDD;">
              @if($categoria->titulo != '')
              {{strtoupper($categoria->titulo)}}
              @endif
            @endif
            @endforeach
          </div>
                <div>
          <div style="padding-top:15px;">



<div class="slider hide-on-med-and-down">
<ul class="slides">
@foreach($galerias as $galeria)
    <li>
        <img src="{{ asset('imagenes/galerianovedad/'.$galeria->imagen) }}" style="filter:brightness(1);">               
        {{-- <div class="caption" style="background: rgba(58,58,59,0.7); left:15%; width: auto; border-top: 35px;">
            <div style="margin: 25px;">                      
              <span class="editorRico blanc1 fw3 Lato" style="font-size: 35px;">{!!$galeria->titulo!!}</span>
              <div align="">
              <div class="fulLinearojiz1" style="margin-bottom: 25px;"></div>                      
              </div>
            </div>
        </div>      --}}
    </li>
@endforeach
</ul>
</div>



        {{-- <img class="responsive-img" src="{{asset('imagenes/productonovedad/'.$novedadI->imagen)}}" style="height: 400px; width: 100%;"> --}}

          </div>
          <div style="padding-top: 20px;">
            <div class="tituloRojo Lato fs24 fw6">
              {!!$novedadI->titulo!!}
            </div>
            <div class="editorRico Lato fs12 fw5" style="color: #858585;">
              {{$novedadI->fecha}}
            </div>
            <div class="editorRico Lato fs16 fw4 yp35" style="color:#666666;">
              {!!$novedadI->texto!!}
            </div>
            <div style="padding-top: 25px; padding-left: 9px;">
            @if($novedadI->ficha != '')
              <a href="{{asset('imagenes/productonovedad/'.$novedadI->ficha)}}" class="btn btn-ficha" target="_blank" style="background: #D00E24;
padding-left: 45px; padding-right: 45px; font-weight: 600;">DESCARGAR PDF</a>
            @endif
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
