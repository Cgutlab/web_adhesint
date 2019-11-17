@extends('adm.main')

@section('titulo', 'Editar sliders')

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
					<td>Titulo</td>
          <td>Orden</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($sliders as $slider)
					<tr>
            <td><img class="slider-foto" src="{{ asset("img/sliders/".$slider->imagen) }}" height="100px"></td>
						<td><span>{!! $slider->titulo !!}</span></td>
						<td><span class="adm-estandar">{!! $slider->orden !!}</span></td>
						<td class="text-right">
							<a href="{{ url('adm/home/slider/edit/'.$slider->id) }}"><i class="material-icons">create</i></a>
							{!!Form::open(['class'=>'en-linea', 'route'=>['slider.destroy', $slider->id], 'method' => 'DELETE'])!!}
								<button type="submit" class="submit-button">
									<i class="material-icons red-text">cancel</i>
								</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			</div>
		</div>
    </div>
</main>
<style type="text/css">

</style>

@endsection
