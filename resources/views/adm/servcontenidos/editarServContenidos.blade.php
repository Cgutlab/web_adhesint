@extends('adm.main')

@section('titulo', 'Editar Contenido Servicios')

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
			          <td>Orden</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($servcontenidos as $servcontenido)
					<tr>
						<td>{!! $servcontenido->titulo !!}</td>
			            <td>{!! $servcontenido->orden !!}</td>
						<td class="text-right">
							<a href="{{ route('servcontenido.edit',$servcontenido->id) }}"><i title="Editar" class="material-icons">create</i></a>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>			
			</div>
		</div>
		{!! $servcontenidos->render() !!}
    </div>
</main>

<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection