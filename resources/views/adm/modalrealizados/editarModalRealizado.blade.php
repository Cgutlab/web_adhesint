@extends('adm.main')

@section('titulo', 'Editar Item Realizados')

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
      		{!!Form::model($modalrealizado, ['route'=>['modalrealizado.update', $modalrealizado->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s8">
						<div class="btn">
						    <span>Imagen Principal</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',$modalrealizado->imagen, ['class'=>'file-path validate', 'required']) !!}
						</div>
					</div>
 
					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',$modalrealizado->orden,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen1</span>
						    {!! Form::file('imagen1') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',$modalrealizado->imagen1, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen2</span>
						    {!! Form::file('imagen2') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',$modalrealizado->imagen2, ['class'=>'file-path validate']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::text('titulo', $modalrealizado->titulo, ['class'=>'validate', 'required' ])!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Subtitulo')!!}
						{!!Form::text('subtitulo', $modalrealizado->subtitulo, ['class'=>'validate', 'required' ])!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Texto')!!}
						{!!Form::textarea('texto', $modalrealizado->texto, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5', ])!!}
					</div>
				</div>		
				
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
			{!!Form::close()!!} 
		</div>
	</div>
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('texto');
    CKEDITOR.config.width = 500;
    CKEDITOR.config.width = '99%';
</script>
@endsection