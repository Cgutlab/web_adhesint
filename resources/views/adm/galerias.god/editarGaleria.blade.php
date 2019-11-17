@extends('adm.main')

@section('titulo', 'Editar Producto')

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
			{!!Form::model($galeria, ['route'=>['galeria.update', $galeria->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
				<div class="row">
			      	<label class="col s12" for="title">Ruta</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('ruta', $galeria->ruta, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',$galeria->orden,['class'=>'validate', 'required'])!!}
					</div>
					<div class="input-field col s6">
						{!!Form::label('Seleccione el Producto')!!}
						{!!Form::text('id_producto',$galeria->id_producto,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">
					<div class="file-field input-field col s6">
					    <div class="btn">
					        <span>Imagen</span>
					        {!! Form::file('imagen') !!}
					    </div>
					    <div class="file-path-wrapper">
					      	{!! Form::text('',$galeria->imagen, ['class'=>'file-path validate']) !!}
					    </div>
					</div>					
				</div>
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('ruta');
	CKEDITOR.config.width = '100%';
</script>
@endsection