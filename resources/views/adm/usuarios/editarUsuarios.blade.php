@extends('adm.main')

@section('titulo', 'Editar usuarios')

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
						<tr>
							<th>Nombre</th>
							<th>Usuario</th>
							<th class="text-right">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->firstname}}</td>
							<td>{{$user->user}}</td>
							<td class="text-right"><a href="{{ route('usuarios.edit', $user->id) }}"><i class="material-icons">create</i></a>
								{!!Form::open(['class'=>'en-linea', 'route'=>['usuarios.destroy', $user->id], 'method' => 'DELETE'])!!}
								<button type="submit" class="submit-button">
									<i class="material-icons red-text">cancel</i>
								</button>
								{!!Form::close()!!}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{!!$users->render()!!}
	</div>
</main>

@endsection