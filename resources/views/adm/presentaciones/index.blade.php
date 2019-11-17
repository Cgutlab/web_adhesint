@extends('adm.main')

@section('titulo', 'Presentaciones')

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
					<table class="highlight bordered">
						<thead>
							<td>Imagen</td>
							<td>Titulo</td>
							<td>Peso</td>
							<td>Orden</td>
							<td class="text-right">Acciones</td>
						</thead>
						<tbody>
							@foreach($presentaciones as $categoria)
							<tr>
								<td><img class="logo" src="{{ asset('img/presentacion/'.$categoria->imagen) }}" max-height="50px"></td>
								<td>{!! $categoria->titulo !!}</td>
								<td>{!! $categoria->peso !!}</td>
								<td>{!! $categoria->orden !!}</td>
								<td class="text-right">
									<a href="{{ route('presentaciones.edit',$categoria->id) }}"><i title="Editar" class="material-icons">create</i></a>
									{!!Form::open(['class'=>'en-linea', 'route'=>['presentaciones.destroy', $categoria->id], 'method' => 'DELETE'])!!}
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
			{!! $presentaciones->render() !!}
		</div>
</main>

<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection