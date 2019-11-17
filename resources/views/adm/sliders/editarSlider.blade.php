@extends('adm.main')

@section('titulo', 'Editar Slider')

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
				{!!Form::model($slider, ['route'=>['slider.update', $slider->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col s8">
						<div class="btn">
							<span>Imagen</span>
							{!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
							{!! Form::text('',$slider->imagen, ['class'=>'file-path validate']) !!}
						</div>
					</div>
					<div class="input-field col s4">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',$slider->orden,['class'=>'validate'])!!}
					</div>
				</div>
				<div class="row">
					<label class="col s12" for="title">Titulo</label>
					<div class="input-field col s12">
						{!!Form::textarea('titulo', $slider->titulo, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
					</div>
				</div>
				@if($slider->seccion == 'home')
					<div class="row">
						<label class="col s12" for="title">Subtitulo</label>
						<div class="input-field col s12">
							{!!Form::textarea('subtitulo', $slider->subtitulo, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
						</div>
					</div>
					@endif
					{{--
					<div class="row">
				      	<label class="col s12" for="title">SubTitulo</label>
				      	<div class="input-field col s12">
							{!!Form::textarea('caption', $slider->caption, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
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
	CKEDITOR.replace('subtitulo');
	CKEDITOR.config.width = '100%';
</script>

@endsection