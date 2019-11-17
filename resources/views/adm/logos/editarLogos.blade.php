@extends('adm.main')

@section('titulo', 'Editar Logos')

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
						<td>Logo</td>
						<td>Tipo</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
						@foreach($logos as $logo)
						<tr>
							<td><img class="logo" src="{{ asset('img/logos/'.$logo->imagen) }}" height="50px"></td>
							<td>{{$logo->type}}</td>
							<td class="text-right">
								<a href="{{ route('logos.edit', $logo->id) }}"><i class="material-icons">create</i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{!!$logos->render()!!}
	</div>
</main>


@endsection