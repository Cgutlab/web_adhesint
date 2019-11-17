@extends('adm.main')

@section('titulo', 'Editar Datos')

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
						<td>Tipo</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
						@foreach($datos as $dato)
						<tr>
							<td style="text-transform: capitalize;">{{$dato->type}}</td>
							<td class="text-right">
								<a href="{{ route('datos.edit', $dato->id) }}"><i class="material-icons">create</i></a>
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