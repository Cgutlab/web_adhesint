@extends('adm.main')

@section('titulo', 'Crear Producto Novedad')

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
			{!!Form::open(['route'=>'productonovedad.store', 'method'=>'POST', 'files' => true])!!}
				<div class="row">
					<div class="input-field col s2">
						Seleccione una categoria:
					</div>
					<div class="input-field col s6">
						<select name="id_categorias_novedads" style="display: inherit;" required>
						@foreach($categorias as $categoria)
						<option value="{{$categoria->id}}">{!!$categoria->titulo!!}</option>
						@endforeach
						</select>
					</div>
					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',null,['class'=>'validate','required'])!!}
					</div>						
		        </div>

				<div class="row"> 
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',null, ['class'=>'file-path validate', 'required', 'placeholder'=>'Recomendado (  X  )']) !!}
						</div>
					</div>
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Ficha</span>
						    {!! Form::file('ficha') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',null, ['class'=>'file-path validate', 'placeholder'=>'Archivo PDF']) !!}
						</div>
					</div>							
				</div>    

				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('titulo')!!}
						{!!Form::text('titulo',null,['class'=>'validate','required'])!!}
					</div>	
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Extracto')!!}
						{!!Form::textarea('extracto', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5', ])!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Texto')!!}
						{!!Form::textarea('texto', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5', ])!!}
					</div>
				</div>	


				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('fecha')!!}
						{!!Form::text('fecha', date("Y-m-d"), ['class'=>'validate', 'cols'=>'74', 'rows'=>'5', ])!!}
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
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>  
  	CKEDITOR.replace('texto');
  	CKEDITOR.replace('extracto');
    CKEDITOR.config.width = 500;
    CKEDITOR.config.width = '99%';
</script>
<script src="" type="text/javascript"></script>
@endsection

