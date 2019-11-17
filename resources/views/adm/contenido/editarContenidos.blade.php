@extends('adm.main')

@section('titulo', 'Editar Contenidos')

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
				<table class="highlight bordered">
					<thead>
						<td>Titulo</td>
						<td>Seccion</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
						@foreach($contenidos as $contenido)
						<tr>
							<td><span>{!! $contenido->titulo1 !!}</span></td>
							<td><span>{!! $contenido->seccion !!}</span></td>
							<td><span>{!! $contenido->orden !!}</span></td>
							<td class="text-right">
								<a href="{{ route('contenido.edit',$contenido->id) }}"><i class="material-icons">create</i></a>
								{{--
							{!!Form::open(['class'=>'en-linea', 'route'=>['contenido.destroy', $contenido->id], 'method' => 'DELETE'])!!}
								<button type="submit" class="confirmar submit-button">
									<i class="material-icons red-text">cancel</i>
								</button>
							{!!Form::close()!!}
--}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>

@endsection