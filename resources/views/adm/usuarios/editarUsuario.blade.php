@extends('adm.main')

@section('titulo', 'Editar usuario')

@section('cuerpo')

<main>
	<div class="container">
		@if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
			<ul>
				@foreach($errors->all() as $error)
					<li>{!!$error!!}</li>
					@endforeach
			</ul>
		</div>
		@endif
		@if(session('success'))
		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
			{{ session('success') }}
		</div>
		@endif

		<div class="row">
			<div class="col-sm-12">
				{!!Form::model($user, ['route'=>['usuarios.update', $user->id], 'method'=>'PUT'])!!}
				<div class="row">
					<div class="input-field col s12">
						{!!Form::text('user',null,['class'=>'validate', 'required'])!!}
						{!!Form::label('Usuario')!!}
					</div>
					<div class="input-field col s12">
						{!!Form::password('password',null,['class'=>'validate', 'required'])!!}
						{!!Form::label('Contraseña')!!}
						<small>Dejar en blanco para mantener contraseña actual.</small>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::text('firstname',null,['class'=>'validate', 'required'])!!}
						{!!Form::label('Nombre')!!}
					</div>
					<div class="input-field col s12">
						{!!Form::text('lastname',null,['class'=>'validate', 'required'])!!}
						{!!Form::label('Apellido')!!}
					</div>
					<div class="input-field col s12">
						{!!Form::text('address',null,['class'=>'validate', 'required'])!!}
						{!!Form::label('Dirección')!!}
					</div>
					<div class="input-field col s12">
						{!!Form::text('email',null,['class'=>'validate', 'required'])!!}
						{!!Form::label('Correo Electrónico')!!}
					</div>
					<div class="input-field col s12">
						{!!Form::text('phone',null,['class'=>'validate', 'required'])!!}
						{!!Form::label('Teléfono')!!}
					</div>
				</div>
				{!!Form::hidden('id', $user->id)!!}
				<div class="col s12 no-padding">
					{!!Form::submit('Guardar', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</main>

@endsection