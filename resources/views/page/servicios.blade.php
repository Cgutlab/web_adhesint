<!DOCTYPE html>

<html lang="es">

<head>



@include('page.template.metas')

@include('page.template.links')



</head>

<body>



@include('page.template.header')

@include('page.template.slider')

@include('page.template.contenido')



<section class="actividades">

  <div class="container"  style="margin-bottom: 35px;">

	  <div class="fs38 fc2 center-align" style="margin-bottom: 35px;">

	    Actividades

	  </div>

	  <div class="row">

		  @foreach($actividades as $actividad)

		  <div class="col l3 m6 s12 center-align" style="margin-bottom: 45px;">

			  <div><img src="{{asset('img/actividades/'.$actividad->imagen)}}"></div>

			  <div class="fs22 lts" style="color: #467279;">{{$actividad->titulo}}</div>

		  </div>

		  @endforeach

	  </div>



  </div>

</section>



@include('page.template.footer')



</body>

</html>



@include('page.template.scripts')

