@extends('adm.main')

@section('titulo', 'Crear Novedad')

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
			{!!Form::open(['route'=>'novedad.store', 'method'=>'POST', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',null, ['class'=>'file-path validate', 'required']) !!}
						</div>
					</div>
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>PDF</span>
						    {!! Form::file('pdf') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',null, ['class'=>'file-path validate']) !!}
						</div>
					</div>
				</div>		
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::textarea('titulo',null,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Breve')!!}
						{!!Form::textarea('breve',null,['class'=>'validate'])!!}
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Descripcion')!!}
						{!!Form::textarea('descripcion',null,['class'=>'validate'])!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s2">
						Seleccione una categoria:
					</div>
			      	<div class="input-field col s8">
			 			<select name="id_categoria" style="display: inherit;">
			           		@foreach($categorias as $categoria)
			                    <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
			           		@endforeach
			           	</select>
					</div>
					<div class="input-field col s2">
						{!!Form::label('Fecha')!!}
						{!!Form::text('fecha',\Carbon\Carbon::parse()->format('d/m/Y'),['class'=>'validate'])!!}
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
<script src="//cdn.ckeditor.com/4.5.6/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace("breve");
    CKEDITOR.replace("descripcion");
    CKEDITOR.config.width = 500;
    CKEDITOR.config.width = '99%';
</script>
@endsection

