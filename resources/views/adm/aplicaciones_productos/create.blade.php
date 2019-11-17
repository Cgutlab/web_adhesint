@extends('adm.main')

@section('titulo', 'Productos/Crear Producto')

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
				<div class="row">
					<div class="right">
						<a href="{{ route('aplicaciones_productos.lists',$categoria->id) }}" class="right"><i title="Regresar" class="material-icons">backspace</i></a>
					</div>
					<div class="center-align">
						{{$categoria->titulo}}
					</div>
				</div>
				{!!Form::open(['route'=>'aplicaciones_productos.store', 'method'=>'POST', 'files' => true])!!}

				<div class="row">
					<div class="file-field input-field col s8">
						<div class="btn">
							<span>Imagen</span>
							{!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
							{!! Form::text('',null, ['class'=>'file-path validate', 'required', 'placeholder' => 'Imagen Cuadrada']) !!}
						</div>
					</div>
					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',null,['class'=>'validate', 'required'])!!}
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::text('titulo',null,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">
					<label class="col s12" for="caracteristica">Texto</label>
					<div class="input-field col s12">
						{!!Form::textarea('texto', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
					</div>
				</div>

				<div class="row">
					<div class="file-field input-field col s6 hide">
						{!! Form::label('id_categoria') !!}<br />
						{!! Form::text('id_categoria', $categoria->id) !!}
					</div>
				</div>

				{{--
				<div class="row">
				<div class="file-field input-field col s12">
				<div class="btn">
				<span>Ficha PDF</span>
				{!! Form::file('ficha') !!}
			</div>
			<div class="file-path-wrapper">
			{!! Form::text('',null, ['class'=>'file-path validate', 'placeholder' => 'Documento PDF']) !!}
		</div>
	</div>
</div>
				<div class="row">
					<label class="col s12" for="caracteristica">Características</label>
					<div class="input-field col s12">
						{!!Form::textarea('caption', null, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
					</div>
				</div>

				<div class="row">
					<div class="input-field col l6 s12">
						{!! Form::label('marcas') !!}<br />
						{!! Form::select('marcas[]', $marcas, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
					</div>
					<div class="input-field col l6 s12">
						{!! Form::label('presentaciones') !!}<br />
						{!! Form::select('presentaciones[]', $presentaciones, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
					</div>
				</div>

				--}}
				<div class="row">
					<div class="input-field col l6 s12">
						{!! Form::label('relacionados') !!}<br />
						{!! Form::select('relacionados[]', $relacionados, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Keywords')!!}
						{!!Form::text('keywords',null,['class'=>'validate'])!!}
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('select').formSelect();
	});
</script>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('texto');
	CKEDITOR.config.width = 500;
	CKEDITOR.config.width = '99%';
</script>
@endsection