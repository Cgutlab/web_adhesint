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
				{!!Form::model($producto, ['route'=>['productos.update', $producto->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="row">
						<div class="input-field col s7">
							<select name="id_category">
								@foreach($categorias as $categoria)
								<option value="{{$categoria->id}}" @if($producto->id_category == $categoria->id)
									selected
									@endif >{{$categoria->titulo}}</option>
								@endforeach
							</select>
							<label>Seleccione la categoria</label>
						</div>
						<div class="input-field col s5">
							{!!Form::label('Orden')!!}
							{!!Form::text('orden',$producto->orden,['class'=>'validate','required'])!!}
						</div>
					</div>

					<div class="row">
						<div class="file-field input-field col s7">
							<div class="btn">
								<span>Imagen Principal</span>
								{!! Form::file('imagen') !!}
							</div>
							<div class="file-path-wrapper">
								{!! Form::text('',$producto->imagen, ['class'=>'file-path validate']) !!}
							</div>
						</div>
						<div class="file-field input-field col s5">
							<div class="btn">
								<span>Plano</span>
								{!! Form::file('plano') !!}
							</div>
							<div class="file-path-wrapper">
								{!! Form::text('',$producto->plano, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="file-field input-field col s6">
							<div class="btn">
								<span>Imagen1</span>
								{!! Form::file('imagen1') !!}
							</div>
							<div class="file-path-wrapper">
								{!! Form::text('',$producto->imagen1, ['class'=>'file-path validate']) !!}
							</div>
						</div>
						<div class="file-field input-field col s6">
							<div class="btn">
								<span>Imagen2</span>
								{!! Form::file('imagen2') !!}
							</div>
							<div class="file-path-wrapper">
								{!! Form::text('',$producto->imagen2, ['class'=>'file-path validate']) !!}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							{!!Form::label('Titulo')!!}
							{!!Form::text('titulo',$producto->titulo,['class'=>'validate', 'required'])!!}
						</div>
					</div>


					<div class="row">
						<label class="col s12" for="texto">Texto</label>
						<div class="input-field col s12">
							{!!Form::textarea('texto', $producto->texto, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							{!!Form::label('Caracteristicas')!!}
							{!!Form::textarea('caracteristicas', $producto->caracteristicas, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
						</div>
					</div>


				</div>
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</main>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="http://osolelaravel.com/baigorria/plugins/materialize/js/materialize.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('select').formSelect();
	});
</script>
<!--
        <div class="row">
          <div class="file-field input-field col s6">
            <div class="btn">
                <span>Ficha</span>
                {!! Form::file('pdf') !!}
            </div>
            <div class="file-path-wrapper">
                {!! Form::text('',$producto->pdf, ['class'=>'file-path validate']) !!}
            </div>
          </div>
        </div>
-->
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('texto');
	CKEDITOR.replace('caracteristicas');
	CKEDITOR.config.width = 500;
	CKEDITOR.config.width = '99%';
</script>
@endsection