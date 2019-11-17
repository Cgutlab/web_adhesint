<!DOCTYPE html>

<html lang="es">

<head>



@include('page.template.metas')

@include('page.template.links')



</head>

<body>



@include('page.template.header')

@include('page.template.slider')





<section class="imagenes container" style="width:100%;">

<div class="container-fluid" style="margin: 5% 10%;">

	<div class="row">

		<div class="col s12 l8" style="padding-left: 0px; display: flex; justify-content: center; align-items: center; margin-bottom: 50px;">

				<?php $i=1; ?>

				@foreach($imagenes as $imagen)

					@if($i==1)

						<img id="ppal-img" class="responsive-img" src="{{asset('img/galerias/'.$imagen->imagen)}}" style="max-width: 100%!important;">

						<?php $i++; ?>

					@endif

				 @endforeach

		</div>

		<div class="col s12 l4">

			<div class="row">

				@foreach($imagenes as $imagen)

					<div class="col s12 m6">

						<img  src="{{asset('img/galerias/'.$imagen->imagen)}}" style="width:100%;" onclick="actualizar('{{asset('img/galerias/'.$imagen->imagen)}}')">

					</div>

				@endforeach

			</div>

		</div>

	</div>

	<div class="row">

		<div style=" margin-top: 35px; margin-bottom: 80px;">

		  <div class="fs38 fc2">

		    {!!$cabana->titulo!!}

		  </div>

		  <div class="fs22 fc6">

		    {!!$cabana->subtitulo!!}

		  </div>

		  <div class="fs18 fc7 fw5">

		    {!!$cabana->texto!!}

		  </div>

		</div>

	</div>

</div>

</section>



<section class="formulario" style="background: #F4F4F4; padding: 50px 0; display: flex; justify-content: center; align-items: center;">

<div class="container" style="width:80%">

	<div class="row">

		<div class="center-align container" style=" margin-top: 35px;">



			<div class="fs38 fc2">

				{!!$contenido->titulo!!}

			</div>




		</div>

	</div>

	<div class="row">

	<div class="col s12 offset-m2 m8">

	  {!!Form::open(['route'=>'contacto.enviar', 'method'=>'POST'])!!}

	  <div class="row">



	    <div class="input-field col s12">

	        {!!Form::label('Nombre')!!}

	        {!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}

	    </div>

	    <div class="input-field col s12">

	        {!!Form::label('Email')!!}

	        {!!Form::email('email',null,['class'=>'validate', 'required'])!!}

	    </div>



	    <div class="col l4 m6">

	      <div class="input-field col s12" style="margin:0; float: left; padding: 0;">

	        <i class="material-icons prefix fs14 fc3 bc2" style="top:0px; padding-top: 8px; right: 30px; ">event_note</i>

	        {!!Form::text('desde', null, ['class' => 'datepicker', 'required', 'autocomplete' => 'off', 'style' => 'margin:0; background: inherit; color: black; font-weight: 500;', 'placeholder' => 'Check In'])!!}

	      </div>

	    </div>

	    <div class="offset-l4 col l4 m6" align="right">

	      <div class="input-field col s12" style="margin:0; float: left; padding: 0;">

	        <i class="material-icons prefix fs14 fc3 bc2" style="top:0px; padding-top: 8px; right: 0px; ">event_note</i>

	        {!!Form::text('hasta', null, ['class' => 'datepicker', 'required', 'autocomplete' => 'off', 'style' => 'margin:0; background: inherit; color: black; font-weight: 500;', 'placeholder' => 'Check In'])!!}

	      </div>

	    </div>



			<div class="input-field col s12 hide">

	        {!!Form::label('Cabaña')!!}

	        {!!Form::text('cabana',$cabana->titulo,['class'=>'validate'])!!}

	    </div>



	    <div class="col s12">

	      <div class="input-field" style="padding:0; background: inherit; color: #8A8A8A;">

	        <select name="pasajeros" required>

	          <option value="1">1 Persona</option>

	          <option value="2">2 Personas</option>

	          <option value="3">3 Personas</option>

	          <option value="4">4 Personas</option>

	          <option value="5">5 Personas</option>

	          <option value="mas de 6">Más Personas</option>

	        </select>

	      </div>

	    </div>



	    <div class="col s12">

	      <div class="input-field">

	      {!!Form::label('Mensaje')!!}

	      {!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea'])!!}

	      </div>

	    </div>

	    <div class="row">

	      <div class="col l6 m12">

	        <div class="g-recaptcha" data-sitekey="6Ldco1gUAAAAAKKt7QO7vSn4tkahcQuMBXAHTeRj"></div>

	      </div>

	      <div class="col l6 m12">

	        <label>

	          <input type="checkbox" name="acepto" required/>

	          <span>

	              <a href="#modal1" class="modal-trigger" style="color:#494949;">

	              <div class="fs15 gris15">Acepto los términos y condiciones de privacidad</div>

	              </a>

	          </span>

	        </label>

	      </div>

	    </div>

	    <div class="col s12" style="margin-top: 25px;">

	      <div class="col s12 no-padding">

	        {!!Form::submit('ENVIAR', ['class' => 'fs14', 'style' => 'padding: 12px 20px; margin: 0 15px; border: 1px solid #6C6C6C; color: #6C6C6C; background: white;'])!!}

	      </div>

	    </div>

	  </div>

	  {!!Form::close()!!}

	</div>

	</div>

</div>

</section>



<div id="modal1" class="modal">

  <div class="modal-content">

    <h4>Términos y condiciones</h4>

    <p>{!! $contenido->texto !!}</p>

  </div>

  <div class="modal-footer">

    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>

  </div>

</div>



<script>

	function actualizar(imagen){

			document.getElementById('ppal-img').src = imagen;

		}

</script>



@include('page.template.footer')



</body>

</html>



@include('page.template.scripts')



<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

<script type="text/javascript">

  $(document).ready(function(){

    $('.modal').modal();

  });

	$(document).ready(function(){

	 $('.datepicker').datepicker({

						format: 'dd-mm-yyyy',

							selectYears: 200,

							min: new Date(2018,11,23),

							max: new Date(2080,12,31)

				});

	 });

	$(document).ready(function(){

		$('select').formSelect();

	});

</script>

