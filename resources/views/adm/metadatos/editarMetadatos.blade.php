@extends('adm.main')

@section('titulo', 'Editar Metadatos')

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
						<td>Seccion</td>
						<td>Keyword</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
						@foreach($metadatos as $metadato)
						<tr>
							<td>{{$metadato->seccion}}</td>
							<td>{{$metadato->keyword}}</td>
							<td class="text-right">
								<a href="{{ route('metadatos.edit', $metadato->id) }}"><i class="material-icons">create</i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{!!$metadatos->render()!!}
	</div>
</main>


@endsection