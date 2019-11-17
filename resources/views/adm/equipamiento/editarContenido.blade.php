@extends('adm.main')

@section('titulo', 'Editar contenido de equipamiento')

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
			{!!Form::model($equipamiento, ['route'=>['equipamiento.contenido.update', $equipamiento->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
			      	<label class="col s12" for="titulo">Titulo principal</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo', $equipamiento->titulo, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
				<div class="row">
			      	<label class="col s12" for="texto">Texto Principal</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('texto', $equipamiento->texto, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
				<div class="row">
					<div class="file-field input-field col s6">
					    <div class="btn">
					        <span>Imagen</span>
					        {!! Form::file('imagen') !!}
					    </div>
					    <div class="file-path-wrapper">
					      	{!! Form::text('',null, ['class'=>'file-path validate']) !!}
					    </div>
					</div>
				</div>
				
				<div class="col s12 no-padding">
					{!!Form::submit('Guardar', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('titulo');
	CKEDITOR.replace('texto');
	CKEDITOR.config.height = '300px';
	CKEDITOR.config.width = '100%';
</script>
@endsection