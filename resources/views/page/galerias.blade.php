<!DOCTYPE html>

<html lang="es">

<head>



@include('page.template.metas')

@include('page.template.links')



</head>

<body>



@include('page.template.header')

@include('page.template.slider')

@include('page.template.contenido')







<section class="galerias">

  <div class="container"  style=" width: 100%;">

    <div class="row">

      <div class="col s12">

            <ul class="tabs" style="display: flex; justify-content: center; align-items:center; margin-bottom: 20px;">

                <li class="tab col s2"><a href="#todos">TODOS</a></li>

              @foreach($categorias as $categoria)

                @php $incrementa++; @endphp



                  <li class="tab col s2"><a href="#test{{$categoria->id}}">{{$categoria->titulo}}</a></li>



              @endforeach

            </ul>

          <div id="todos" class="col s12">

            <div class="row center-align">

            @foreach($galeria as $imgs)

              <div class="col l4 m12" style="margin-bottom: 24px;">

                  <img src="{{asset('img/galerias/'.$imgs->imagen)}}" class="responsive-img materialboxed">

              </div>

            @endforeach

            </div>

          </div>

          @foreach($categorias as $item)

            <div id="test{{$item->id}}" class="col s12">

              <div class="row center-align">

              @foreach($item->vgalerias as $imagen)

                <div class="col l4 m12" style="margin-bottom: 24px;">

                  <img src="{{asset('img/galerias/'.$imagen->imagen)}}" class="responsive-img materialboxed">

                </div>

              @endforeach

              </div>

            </div>

          @endforeach

      </div>

    </div>

  </div>

</section>



@include('page.template.footer')



</body>

</html>



@include('page.template.scripts')



<script>

$(document).ready(function(){

$('.tabs').tabs();

});

$(document).ready(function(){

  $('.materialboxed').materialbox();

});

</script>

