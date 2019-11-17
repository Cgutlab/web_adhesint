<!DOCTYPE html>
<html>
<body>
	<h2>Alambrados Prix</h2>
@if(isset($telefono)) 	<h3>Contacto</h3> @endif
@if(isset($apellido)) 	<h3>Solucion a Medida</h3> @endif

	<p>Enviado desde la web </p>
	<br>
	<br>
	<h3>Datos del contacto</h3>
	<ul>
		<li><strong>Nombre:</strong> {{$nombre}}</li>

@if(isset($apellido))	<li><strong>Apellido:</strong> {{$apellido}}</li>@endif
@if(isset($telefono))	<li><strong>Telefono:</strong> {{$telefono}}</li>@endif

		<li><strong>Email:</strong> {{$email}}</li>
		<li><strong>Empresa:</strong> {{$empresa}}</li>
		<br>
		<br>
		<h4>Mensaje:</h4>
		<p>{{$mensaje}}</p>
	</ul>
</body>
</html>