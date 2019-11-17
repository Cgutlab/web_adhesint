@extends('adm.main')

@section('titulo', 'Editar Red Social')

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
			{!!Form::model($red, ['route'=>['redes.update', $red->id], 'method'=>'PUT', 'files' => true])!!}
{{--
			<div class="row">
				<div class="file-field input-field col s12">
					<div class="btn">
							<span>Imagen</span>
							{!! Form::file('imagen') !!}
					</div>
					<div class="file-path-wrapper">
							{!! Form::text('',$red->imagen, ['class'=>'file-path validate', 'placeholder'=>'Recomendado (20 X 20) Pixels']) !!}
					</div>
				</div>
			</div>
--}}
			<div class="row">
				<div class="input-field col s12">
					{!!Form::label('Codigo Icon')!!}
					{!!Form::text('icon',$red->icon,['class'=>'validate'])!!}
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					{!!Form::label('Ruta')!!}
					{!!Form::text('ruta',$red->ruta,['class'=>'validate', 'required'])!!}
				</div>
			</div>
			<div class="row">
				<div class="input-field col s8">
					{!!Form::label('Titulo')!!}
					{!!Form::text('titulo',$red->titulo,['class'=>'validate', 'required'])!!}
				</div>
				<div class="input-field col s4">
					{!!Form::label('Orden')!!}
					{!!Form::text('orden',$red->orden,['class'=>'validate', 'required'])!!}
				</div>
			</div>
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
			{!!Form::close()!!}
			</div>
		</div>
	</div>
</main>
@endsection
