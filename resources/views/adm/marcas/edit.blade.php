@extends('adm.main')

@section('titulo', 'Marcas')

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
				{!!Form::model($marca, ['route'=>['marcas.update', $marca->id], 'method'=>'PUT', 'files' => true])!!}

				<div class="row">
					<div class="file-field input-field col s8">
						<div class="btn">
							<span>Imagen</span>
							{!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
							{!! Form::text('',$marca->imagen, ['class'=>'file-path validate', 'placeholder' => 'Imagen']) !!}
						</div>
					</div>
					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',$marca->orden,['class'=>'validate', 'required'])!!}
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::text('titulo',$marca->titulo,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">
					<div class="file-field input-field col s6">
						<label>
							<input type="checkbox" name="visible_home" @if($marca->visible_home) checked="checked"
							@endif />
							<span>Destacado (home)</span>
						</label>
					</div>
				</div>

				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</main>
@endsection