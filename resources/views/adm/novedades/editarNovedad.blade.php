@extends('adm.main')

@section('titulo', 'Editar Novedad')

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
			{!!Form::model($novedad, ['route'=>['novedad.update', $novedad->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">

				<div class="row">
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',$novedad->imagen, ['class'=>'file-path validate']) !!}
						</div>
					</div>					
					<div class="file-field input-field col s6">
						<div class="btn">
						    <span>PDF</span>
						    {!! Form::file('pdf') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('',$novedad->pdf, ['class'=>'file-path validate']) !!}					    
						</div>
					</div>					
				</div>
				<div class="row">
					<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::text('titulo',$novedad->titulo,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">
			      	<label class="col s12" for="breve">Breve</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('breve', $novedad->breve, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>

				<div class="row">
			      	<label class="col s12" for="descripcion">Descripcion</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('descripcion', $novedad->descripcion, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
				<div class="row">
					<div class="input-field col s2">
						Seleccione una categoria:
					</div>
			      	<div class="input-field col s8">
			 			<select name="id_categoria" style="display: inherit;">
			           		@foreach($categorias as $categoria)
			                    <option value="{{$categoria->id}}" @if($categoria->id == $novedad->id_categoria) @php echo 'selected'; @endphp @endif>{{$categoria->titulo}}</option>
			           		@endforeach
			           	</select>
					</div>
					<div class="input-field col s2">
						{!!Form::label('Fecha')!!}
						{!!Form::text('fecha',null,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
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