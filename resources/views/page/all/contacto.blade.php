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

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.8109039526653!2d-58.32628774236278!3d-34.73516053112652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a32d9dd86733ed%3A0xb29095e6546adf83!2sAlambrados+Prix!5e0!3m2!1ses!2sar!4v1530898984566" width="100%" style="border:1px solid #EEEEEE; border-top: none;" height="440" frameborder="0" style="border:0" allowfullscreen></iframe>


{!!Form::open(['route'=>'contacto.enviar', 'method'=>'POST'])!!}
<div class="container" style="width: 80%;">


<div class="gris10 Raleway fs16 yp35" align="center">
Contáctanos y te brindaremos toda la información que necesites
</div>



<div class="row">
	<div class="input-field col m6 s12">
	{!!Form::text('nombre',null,['class'=>'validate', 'placeholder'=>'Nombre', 'required'])!!}
	<label for="nombre"></label>
	</div>
	<div class="input-field col m6 s12">
	{!!Form::text('telefono',null,['class'=>'validate', 'placeholder'=>'Teléfono', 'required'])!!}
	<label for="telefono"></label>
	</div>
</div>
<div class="row">
	<div class="input-field col m6 s12">
	{!!Form::text('empresa',null,['class'=>'validate', 'placeholder'=>'Empresa', 'required'])!!}
	<label for="empresa"></label>
	</div>
	<div class="input-field col m6 s12">
	{!!Form::email('email',null,['class'=>'validate', 'placeholder'=>'E-mail', 'required'])!!}
	<label for="email"></label>
	</div>
</div>
<div class="row">
	<div class="input-field col m6 s12" style="margin-top: 47px;">
	<label for="mensaje"></label>
	{!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje', 'required'])!!}
	</div>
	<div class="input-field col m6 s12" style="padding-top:0px; margin-bottom: 20px;">	
	<div class="g-recaptcha" data-sitekey="6Ldco1gUAAAAAKKt7QO7vSn4tkahcQuMBXAHTeRj"></div>
	<div class="fs15 gris15" style="font-family: 'Source Sans Pro';">Acepto los términos y condiciones de privacidad</div>
	</div> 
</div>
<div class="row" style="padding-bottom: 50px;">
	<div align="center">                      
	<div class="col m12">
	<button class="btn waves-effect waves-light z-depth-0" type="submit" name="action" style="background-color: #DE2007; padding: 0px 50px 5px 50px; color: white;">Enviar
	</button>
	</div>
	</div>
</div>
</div>
{!!Form::close()!!}


@include('page.template.footer')

<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>  
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
