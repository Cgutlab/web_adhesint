@extends('adm.main')

@section('titulo', 'Editar Categoria')

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
			{!!Form::model($descarga, ['route'=>['descarga.update', $descarga->id], 'method'=>'PUT', 'files' => true])!!}
				
				<div class="row">
				<div class="file-field input-field col s10">
					    <div class="btn">
					        <span>Archivo</span>
					        {!! Form::file('imagen') !!}
					    </div>
					    <div class="file-path-wrapper">
					      	{!! Form::text('',$descarga->imagen, ['class'=>'file-path validate']) !!}
					    </div>
					</div>
				</div>
				<div class="row">
				<div class="row">
			      	<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::text('titulo',$descarga->titulo,['class'=>'validate', 'required'])!!}
					</div>	
				</div>
        <div class="row">
              <div class="input-field col s12">
            {!!Form::label('Subtitulo')!!}
            {!!Form::text('subtitulo',$descarga->subtitulo,['class'=>'validate', 'required'])!!}
          </div>  
        </div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Orden')!!}
						{!!Form::text('orden',$descarga->orden,['class'=>'validate', 'required'])!!}
					</div>					
				</div>
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>
@endsection