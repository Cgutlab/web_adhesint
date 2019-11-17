@extends('adm.main')

@section('titulo', 'Editar Items Realizados')

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
				@foreach($modalrealizados as $modalrealizado)
					<tr>
						<td>{!! $modalrealizado->titulo !!}</td>
						<td>{!! $modalrealizado->orden !!}</td>
						<td class="text-right">
              		<a href="{{ route('modalrealizado.edit',$modalrealizado->id) }}"><i title="Editar" class="material-icons">create</i></a>
              	{!!Form::open(['class'=>'en-linea', 'route'=>['modalrealizado.destroy', $modalrealizado->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm_delete()'])!!}
                <button type="submit" class="submit-button" id="delete-btn">
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
    {!! $modalrealizados->render() !!}
    </div>
</main>

<script type="text/javascript">
function confirm_delete() {
var result = confirm('¿Esta Seguro Que Deseas Eliminar La Categoria?');

if (result) {
        return true;
    } else {
        return false;
    }
}
</script>


@endsection