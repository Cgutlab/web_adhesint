@extends('adm.main')

@section('titulo', 'Editar Categoria Compresor')

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
			{!!Form::model($categoria, ['route'=>['categoriacompresor.update', $categoria->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					
					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',$categoria->orden,['class'=>'validate', 'required'])!!}
					</div>	
				</div>

				<div class="row">					
					<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::textarea('titulo', $categoria->titulo, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
					</div>
				</div>
{{-- 				<div class="row">					
					<div class="input-field col s12">
						{!!Form::label('Texto')!!}
						{!!Form::textarea('texto', $categoria->texto, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
					</div>
				</div>	 --}}			
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
			{!!Form::close()!!} 
		</div>
	</div>
</main>
{{-- <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('texto');
    CKEDITOR.config.width = 500;
    CKEDITOR.config.width = '99%';
</script> --}}
@endsection