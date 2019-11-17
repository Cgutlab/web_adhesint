@extends('adm.main')

@section('titulo', 'Productos/Editar Productos')

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
					<div class="left">
						<a href="{{ route('aplicaciones_productos.create', $categoria->id) }}"><i title="Agregar" class="material-icons medium">add_circle</i></a>
					</div>
					<div class="right">
						<a href="{{ route('aplicaciones_categorias.index') }}" class="right"><i title="Regresar" class="material-icons">backspace</i></a>
					</div>
				</div>
				<b>{!!$categoria->titulo!!}</b>
				<table class="highlight bordered">
					<thead>
						<td>Imagen</td>
						<td>Titulo</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
						@foreach($productos as $categoria)
						<tr>
							<td><img src="{{asset('img/gallery_aplicacion/'.$categoria->imagen)}}" style="width: 100px;"> </td>
							<td>{!! $categoria->titulo !!}</td>
							<td>{!! $categoria->orden !!}</td>
							<td class="text-right">
								<a href="{{ route('aplicaciones_productos.edit',$categoria->id) }}"><i title="Editar" class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['aplicaciones_productos.destroy', $categoria->id], 'method' => 'DELETE'])!!}
								<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
									<i title="Eliminar" class="material-icons red-text">cancel</i>
								</button>
								{!!Form::close()!!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{!! $productos->render() !!}
	</div>
</main>

<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection
