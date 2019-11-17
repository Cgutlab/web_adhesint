@extends('adm.main')

@section('titulo', 'Editar contenido de home')

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
			{!!Form::model($contenido, ['route'=>['home.contenido.update', $contenido->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
			      	<label class="col s12" for="titulo">Titulo</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('titulo', $contenido->titulo, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
{{-- 			
				<div class="row">
			      	<label class="col s12" for="subtitulo">Subtitulo</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('subtitulo', $contenido->subtitulo, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
--}}
				<div class="row">
			      	<label class="col s12" for="texto">Texto</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('texto', $contenido->texto, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>	
{{-- 			<div class="row">
			      	<label class="col s12" for="ruta">Más información ruta</label>
			      	<div class="input-field col s12">
						{!!Form::text('ruta', $contenido->ruta, ['class'=>'validate'])!!}
				    </div>
				</div>
--}}	
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
/*	CKEDITOR.replace('subtitulo');*/
	CKEDITOR.replace('texto');
	CKEDITOR.config.height = '300px';
	CKEDITOR.config.width = '100%';
</script>
@endsection