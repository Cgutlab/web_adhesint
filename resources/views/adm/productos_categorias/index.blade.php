@extends('adm.main')

@section('titulo', 'Productos/Editar Categorias')

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
						<a href="{{ route('productos_categorias.create') }}"><i title="Agregar" class="material-icons medium">add_circle</i></a>
					</div>
				</div>
				<table class="highlight bordered">
					<thead>
						<td>Imagen</td>
						<td>Titulo</td>
						<td>Orden</td>
						<td>Productos</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
						@foreach($categorias as $categoria)
						<tr>
							<td><img src="{{asset('img/gallery_productos/'.$categoria->imagen)}}" style="width: 100px;"> </td>
							<td>{!! $categoria->titulo !!}</td>
							<td>{!! $categoria->orden !!}</td>
							<td><a href="{{ route('productos_productos.lists',$categoria->id) }}"><i title="Editar" class="material-icons">shopping_cart</i></a></td>
							<td class="text-right">
								<a href="{{ route('productos_categorias.edit',$categoria->id) }}"><i title="Editar" class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['productos_categorias.destroy', $categoria->id], 'method' => 'DELETE'])!!}
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
		{!! $categorias->render() !!}
	</div>
</main>

<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection
