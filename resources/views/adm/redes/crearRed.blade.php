@extends('adm.main')

@section('titulo', 'Crear Red Social')

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
			<div class="col s12">
			{!!Form::open(['route'=>'redes.store', 'method'=>'POST', 'files' => true])!!}
{{--
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',null, ['class'=>'file-path validate', 'placeholder'=>'Recomendado (20 X 20) Pixels']) !!}
						</div>
					</div>
				</div>
--}}
				<div class="row">
          <div class="input-field col s12">
            {!!Form::label('Codigo Icon')!!}
            {!!Form::text('icon',null,['class'=>'validate'])!!}
          </div>
					<small>
						Lista de iconos: <a href="https://fontawesome.com/icons?d=gallery" target="_blank">https://fontawesome.com/icons?d=gallery</a>
						<br>
						Solo debes insertar el código Ejemplo: <i class="fab fa-accessible-icon"></i> >> <b>fab fa-accessible-icon</b>
					</small>
        </div>
        <div class="row">
          <div class="input-field col s12">
            {!!Form::label('Ruta')!!}
            {!!Form::text('ruta',null,['class'=>'validate', 'required'])!!}
          </div>
        </div>
				<div class="row">
          <div class="input-field col s8">
            {!!Form::label('Titulo')!!}
            {!!Form::text('titulo',null,['class'=>'validate', 'required'])!!}
          </div>
					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',null,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!}
		</div>
		</div>
	</div>
</main>

@endsection
