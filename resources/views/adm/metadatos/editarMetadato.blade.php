@extends('adm.main')

@section('titulo', 'Editar metadato')

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
				{!!Form::model($metadato, ['route'=>['metadatos.update', $metadato->id], 'method'=>'PUT'])!!}
				<div class="row">
					Sección: {{$metadato->keyword}}
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::text('keyword', $metadato->keyword, ['class'=>'validate', 'required'])!!}
						{!!Form::label('Keyword:')!!}
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::text('text', $metadato->text, ['class'=>'validate', 'required'])!!}
						{!!Form::label('Description:')!!}
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


@endsection