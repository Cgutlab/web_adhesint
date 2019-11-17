<!DOCTYPE html>

<html lang="es">

<head>



@include('page.template.metas')

@include('page.template.links')



</head>

<body>



@include('page.template.header')

@include('page.template.slider')



<section class="productos container" style="width:100%;">

<div class="container-fluid" style="margin: 5%;">

	<div class="row">

		@foreach($cabanas as $cabana)



			<div class="col s12 m6">

			  <div class="card z-depth-0">
{{-- 
			    <div class="card-content cero center-align fw6" style="background: var(--color2); height: 50px; padding: 0px 12px; display: flex; justify-content: center; align-items: center;">

			      

			    </div>			  
 --}}
			    <div class="card-image center-align">

			    	<a href="{{route('cabana', $cabana->id)}}">

			        <div class="efecto">

			        	<span class="central"><i class="material-icons">add</i></span>

			        </div>

						{{-- @if (file_exists(public_path().'/imagenes/galerias/'.$galeria->imagen)) --}}

						{{-- <img src="{{asset('imagenes/galerias/'.$galeria->imagen)}}" style="border: 1px solid #DDD; width: 100%; height: 100%; border-top: 5px solid var(--color2);"> --}}



						@foreach($cabana->igalerias as $imagen)

						    <img src="{{asset('img/galerias/'.$imagen->imagen)}}" style="border: 1px solid #DDD; border-top: 5px solid var(--color2);">

						    @break

						@endforeach

			    	</a>

			    </div>

			    <div class="card-content cero center-align fw6" style="background: var(--color2); height: 80px; padding: 0px 12px;">


			    	<div class="fw5 fs24 center-align" style="color: #D16243;">{!!($cabana->titulo) !!}</div>

			      <div class="fc6 fw5 fs16 center-align">{!!($cabana->subtitulo) !!}</div>

			    </div>

			  </div>

			</div>







		@endforeach

	</div>



	<div class="row">

		<div style=" margin-top: 35px; margin-bottom: 80px;">

		  <div class="fs18 fc7 fw5">

		    {!!$contenido->texto!!}

		  </div>

		</div>

	</div>



</div>

</section>



<script>

	function actualizar(imagen){

			document.getElementById('ppal-img').src = imagen;

		}

</script>



@include('page.template.footer')



</body>

</html>



@include('page.template.scripts')

