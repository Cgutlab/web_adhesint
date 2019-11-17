@extends('adm.main')

@section('titulo', 'Editar Modelos Contenidos')

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
					<td>Ver Productos</td>
					<td class="text-right">Acciones</td>
				</thead>
				<tbody>
				@foreach($modelos as $modelo)
					<tr>
						<td>{!! $modelo->titulo !!}</td>

						<td>
							<a href="{{ route('modelosgalerias.lists',$modelo->id) }}"><i title="Editar" class="material-icons">collections</i></a>
						</td>

						<td class="text-right">

              <a href="{{ route('modeloscontenidos.edit',$modelo->id) }}"><i title="Editar" class="material-icons">create</i></a>
           {!!Form::close()!!}                
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>      
      </div>
    </div>
    {!! $modelos->render() !!}
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