@extends('adm.main')

@section('titulo', 'Editar Banner')

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
						<td>Imagen</td>
						<td>Seccion</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
						@foreach($banner as $bannericono)
						<tr>
							<td><img class="slider-foto" src="{{ asset("img/banners/".$bannericono->imagen) }}" height="100px"></td>
							<td>{!! $bannericono->seccion !!}</td>
							<td>{!! $bannericono->orden !!}</td>
							<td class="text-right">
								<a href="{{ route('banner.edit',$bannericono->id) }}"><i title="Editar" class="material-icons">create</i></a>
								<!-- 							{!!Form::open(['class'=>'en-linea', 'route'=>['banner.destroy', $bannericono->id], 'method' => 'DELETE'])!!}
								<button onclick='return confirm_delete(this);' type="submit" class="submit-button">
									<i title="Eliminar" class="material-icons bannericono-text">cancel</i>
								</button> -->
								{!!Form::close()!!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{!! $banner->render() !!}
	</div>
</main>

<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection