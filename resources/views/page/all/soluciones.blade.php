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
<div class="hide-on-med-and-down cero" style="margin-top: -20px; padding-top: -20px;">
@if($solucion->imagen != null)
<img src="{{asset('imagenes/solucion/'.$solucion->imagen)}}" style="margin-top: -20px; padding-top: -20px;width: 100%; height: 420px;">
@endif
</div>

<div class="ym60">
<div class="container" style="width: 80%;">
<div class="row">
  <div class="col l12">
    <div align="center">
      <div class="Roboto fw5 verde1 fs36 cero">
        <b>{!!$solucion->titulo!!}</b>
      </div>
      <div class="lineaNaranja"></div>
      <div class="yp35 Roboto fw3 gris12 fs20 cero editorRico">
        {!!$solucion->descripcion!!}
      </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div style="background: #F5F5F5;">
<div class="container" style="width: 80%;" align="center">
  <div class="Roboto fw5 verde1 fs24 cero ym60 yp35">
    Para más información
  </div>
  <div class="Roboto fw5 gris15 fs18 cero yp35">
    Complete los siguientes datos y nos comunicaremos a la brevedad
  </div>
</div>

{!!Form::open(['route'=>'contacto.enviar', 'method'=>'POST'])!!}
<div class="container" style="width: 45%;">
<div class="row">
<div class="col l12 s12">
  <label for="nombre"></label>
  {!!Form::text('nombre',null,['class'=>'validate', 'placeholder'=>'Nombre', 'required'])!!}
</div>
</div>

<div class="row">
<div class="col l12 s12">
  <label for="apellido"></label>
  {!!Form::text('apellido',null,['class'=>'validate', 'placeholder'=>'Apellido', 'required'])!!}
</div>
</div>

<div class="row">
<div class="input-field col l12 s12" style="margin-top: 47px;">
  <label for="mensaje"></label>
  {!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje', 'required'])!!}
  </div>
</div>

<div class="row">
  <div class="col l12 s12">
  <label for="email"></label>
  {!!Form::email('email',null,['class'=>'validate', 'placeholder'=>'E-mail', 'required'])!!}
  </div>
</div>

<div class="row">
  <div class="col l12 s12">
  <label for="empresa"></label>
  {!!Form::text('empresa',null,['class'=>'validate', 'placeholder'=>'Empresa', 'required'])!!}
  </div>
</div>

<div class="row">
  <div class="input-field col l7 s12" required>  
  <div class="g-recaptcha" data-sitekey="6Ldco1gUAAAAAKKt7QO7vSn4tkahcQuMBXAHTeRj" required></div>
  </div> 
  <div class="col l5 s12">
  <label>
    <input type="checkbox" required/>
    <span class="fs14 gris15" style="font-family: 'Source Sans Pro';">Acepto los términos y condiciones de privacidad</span>
  </label>
  </div>
</div>
<div class="row" style="padding-bottom: 50px;">
  <div align="center">                      
  <div class="col m12 s12">
  <button class="btn waves-light z-depth-0" type="submit" name="action" style="background-color: #FE8212; padding: 0px 50px 5px 50px; color: white;">Enviar
  </button>
  </div>
  </div>
</div>
</div>
{!!Form::close()!!}
</div>



@include('page.template.footer')

<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>  
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
