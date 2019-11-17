@extends('adm.main')

@section('titulo', 'Editar contenido de empresa')

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
			{!!Form::model($empresa, ['route'=>['empresa.contenido.update', $empresa->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
          <div class="file-field input-field col s12">
              <div class="btn">
                  <span>Imagen</span>
                  {!! Form::file('imagen') !!}
              </div>
              <div class="file-path-wrapper">
                  {!! Form::text('',$empresa->imagen, ['class'=>'file-path validate']) !!}
              </div>
          </div>
        </div>

			<div class="row">
		      	<label class="col s12" for="titulo">Titulo</label>
		      	<div class="input-field col s12">
					{!!Form::textarea('titulo', $empresa->titulo, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
			    </div>
			</div>
			<div class="row">
		      	<label class="col s12" for="titulo2">Subtitulo</label>
		      	<div class="input-field col s12">
					{!!Form::textarea('titulo2', $empresa->titulo2, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
			    </div>
			</div>
			<div class="row">
		      	<label class="col s12" for="texto">Texto Principal</label>
		      	<div class="input-field col s12">
					{!!Form::textarea('texto', $empresa->texto, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
			    </div>
			</div>

			<div class="row">
		      	<label class="col s12" for="politica">Titulo Pie de pagina</label>
		      	<div class="input-field col s12">
					{!!Form::textarea('politica', $empresa->politica, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
			    </div>
			</div>

			<div class="row">
		      	<label class="col s12" for="descripcion">Descripcion Pie de pagina</label>
		      	<div class="input-field col s12">
					{!!Form::textarea('descripcion', $empresa->descripcion, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
			    </div>
			</div>

			<div class="file-field input-field col s12">
              <div class="btn">
                  <span>Imagen Pie de pagina</span>
                  {!! Form::file('imagen2') !!}
              </div>
              <div class="file-path-wrapper">
                  {!! Form::text('',$empresa->imagen2, ['class'=>'file-path validate']) !!}
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
	CKEDITOR.replace('titulo2');	
	CKEDITOR.replace('texto');
	CKEDITOR.replace('politica');
	CKEDITOR.replace('descripcion');
	CKEDITOR.config.height = '300px';
	CKEDITOR.config.width = '100%';
</script>
@endsection