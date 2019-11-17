@extends('adm.main')

@section('titulo', 'Editar Producto')

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
			{!!Form::model($aproducto, ['route'=>['aproducto.update', $aproducto->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
        <div class="row">         
          <div class="file-field input-field col s6">
              <div class="btn">
                  <span>Imagen</span>
                  {!! Form::file('imagen') !!}
              </div>
              <div class="file-path-wrapper">
                  {!! Form::text('',$aproducto->imagen, ['class'=>'file-path validate']) !!}
              </div>
          </div>
          <div class="file-field input-field col s6">
			    <div class="btn">
			        <span>Ficha</span>
			        {!! Form::file('pdf') !!}
			    </div>
			    <div class="file-path-wrapper">
			      	{!! Form::text('',$aproducto->pdf, ['class'=>'file-path validate']) !!}
			    </div>
			</div>	
        </div>
        <div class="row">
        </div>
				<div class="row">					
					<div class="input-field col s12">
						{!!Form::label('Titulo')!!}
						{!!Form::text('titulo',$aproducto->titulo,['class'=>'validate', 'required'])!!}
					</div>
				</div>
				<div class="row">					
					<div class="input-field col s12">
						{!!Form::label('Breve')!!}
						{!!Form::textarea('breve', $aproducto->breve, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
					</div>
				</div>


				<div class="row">
			      	<label class="col s12" for="caracteristica">Texto</label>
			      	<div class="input-field col s12">
						{!!Form::textarea('texto1', $aproducto->texto1, ['class'=>'validate', 'cols'=>'74', 'rows'=>'5'])!!}
				    </div>
				</div>
		        <div class="row">
		          <div class="input-field col s2">
		            Seleccione una categoria:
		          </div>
		              <div class="input-field col s6">
		            <select name="id_acategoria" style="display: inherit;">
			           		@foreach($acategorias as $acategoria)
			                    <option value="{{$acategoria->id}}" @if($acategoria->id == $aproducto->id_categoria) @php echo 'selected'; @endphp @endif>{{$acategoria->titulo}}</option>
			           		@endforeach
			           	</select>
		          </div>
		          <div class="input-field col s4">
					{!!Form::label('Orden')!!}
					{!!Form::text('orden',$aproducto->orden,['class'=>'validate','required'])!!}
				</div>
		        </div>
				{!!Form::submit('guardar', ['class'=>'waves-effect waves-light btn right'])!!}
			{!!Form::close()!!} 
			</div>
		</div>
	</div>
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('breve');
	CKEDITOR.replace('texto1');
    CKEDITOR.config.width = 500;
    CKEDITOR.config.width = '99%';
</script>
@endsection