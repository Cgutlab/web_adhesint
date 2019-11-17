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
<body >
<div style="font-family: 'Lato';">
@include('page.template.header')
</div>
<div class="container" style="width: 82%; margin-top: 50px;">   
<div class="row">
  <div class="col l12">
    <div class="tituloRojo Lato fs36">
    Novedades
    <div class="pemLinearojiz1"></div>
    </div>
  </div>
</div>

<div class="row" style="margin-top: 50px;">
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
  <div class="col l9 m12 s12">
    <ul class="flex-container-nov">
    @foreach($categorys as $category)
    @foreach($novedades as $novedad)
    @if($category->id == $novedad->id_categorias_novedads)
    
    <li class="flex-item-nov" style="border: none; padding-bottom: 20px;">
      <div>
      <img src="{{asset('imagenes/productonovedad/'.$novedad->imagen)}}" class="clientes-box-img" style="height:220px; width: 100%;">
      </div>                  
      <div>
        <div>
          <div style="padding-bottom: 3px;border-bottom: 1px solid #DDDDDD;">
            <div style="padding-left: 8px; font-family: 'Lato'; font-size: 12px; color: #434141; font-weight: 400;">
              {{strtoupper($category->titulo)}}
            </div>
          </div>
          <div style="padding: 5px;">
          <div class="tituloRojo" style="padding-top:5px; font-family: 'Lato'; font-size: 20px; font-weight: 700; padding-top: 10px;">
            {{$novedad->titulo}}
          </div>
          <div style="padding-top:5px; font-family: 'Lato'; font-size: 12px; color: #858585; font-weight: 500;">
            {{$novedad->fecha}}
          </div>
          <div style="padding-top:0px; font-family: 'Lato'; font-size: 17px; color: #666666; font-weight: 400;">
            {!!$novedad->extracto!!}
          </div>
          <div style="padding-top:0px; font-family: 'Lato'; font-size: 18px; color: #009FE1; font-weight: 400; ">
            <a href="{{('/novedad/')}}{{($novedad->id)}}" class="tituloRojo fs14 fw6">Leer m&aacutes »</a>
          </div>
          </div>
        </div>
      </div>
    </li>
    @endif
    @endforeach
    @endforeach
    </ul>
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
