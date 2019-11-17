<!DOCTYPE html>
<html lang="es">

<head>
    @include('page.template.metas')
    @include('page.template.links')
</head>

<body>
    @include('page.template.header')

    <div class="slider">
        <ul class="slides">
            @foreach($sliders as $slider)
            <li style="border-bottom: 0;">
                <img src="{{ asset('img/sliders/'.$slider->imagen) }}">
                <div class="caption" style="">
                    <div class=" hide-on-med-and-down">
                        <span class="lts azul fs30 editorRico ff1 lh38">{!!$slider->titulo!!}</span>
                        <span class="lts gris6 fs18 ff2">{!!$slider->subtitulo!!}</span>
                    </div>
                    <div class="hide-on-large-only">
                        <span class="lts azul ff1">{!!$slider->titulo!!}</span>
                        <span class="lts gris6 ff2">{!!$slider->subtitulo!!}</span>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <section>
        <div class="container" style="width: 80%;">
            <div class="row">
                <div class="col l5 azul fs30 fw6 ff1 lh38">
                    {!!$contenido->titulo1!!}
                    {{--<div style="height:2px; width: 15%;background: #03A9F4; margin-top: 15px;"></div>--}}
                </div>
                <div class="offset-l1 col l6 gris6 fs18 ff2">
                    {!!$contenido->text1!!}
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="width: 60%; padding-top: 25px;">
            <div class="row">
                @foreach($marcas as $marca)
                <div class="col l4 s12 center-align" style="padding-top: 15px;">
                    <img src="{{asset('img/marcas/'.$marca->imagen)}}">
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section style="background: #F6F6F6; padding: 35px 0; margin-top: 35px;">
        <div class="center-align azul fw6 fs20 ff1">
            NUESTROS PRODUCTOS
        </div>
        <div class="container" style="padding-top: 35px; width: 80%; margin-bottom: 80px;">
            <div class="row">
                @foreach($destacados as $destacado)
                <div class="col s12 l4" style="position: relative;">
                    <div class="card z-depth-0" style=" background: #F6F6F6;">
                        <div class="card-image center-align">
                            <a href="{{route('productos', $destacado->id)}}" class="naranja fs20" style="">
                                <div class="efecto" style="">
                                    <span class="central">
                                    <div class="fs26 fw7 blanco ff2">{!!($destacado->titulo)!!}</div>
                                    </span>
                                    <!-- <i class="material-icons">add</i> -->
                                </div>
                                <img src="{{('img/gallery_productos/'.$destacado->imagen)}}" style="border: 1px solid #DDD;width: 100%; height: 100%;">
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container" style="width: 80%;">
            <div class="row">
                <div class="col l6 azul">
                    <h4 class="fw6 ff1" style="width: 70%;">
                        {!!$c1->titulo1!!}
                    </h4>
                    <div style="height:2px; width: 15%;background: #03A9F4; margin-bottom: 25px;"></div>
                    <div class="row" style="margin: 3px 5px 3px 5px;">
                        <div class="col l2">
                            <img class="responsive-img" src="{{('img/contenidos/'.$c2->imagen)}}">
                        </div>
                        <div class="col l10 gris6 fw6 fs22 ff2">
                            {!!$c2->titulo1!!}
                        </div>
                    </div>
                    <div class="row" style="margin: 3px 5px 3px 5px;">
                        <div class="col l2">
                            <img class="responsive-img" src="{{('img/contenidos/'.$c3->imagen)}}">
                        </div>
                        <div class="col l10 gris6 fw6 fs22 ff2">
                            {!!$c3->titulo1!!}
                        </div>
                    </div>
                    <div class="row" style="margin: 3px 5px 3px 5px;">
                        <div class="col l2">
                            <img class="responsive-img" src="{{('img/contenidos/'.$c4->imagen)}}">
                        </div>
                        <div class="col l10 gris6 fw6 fs22 ff2">
                            {!!$c4->titulo1!!}
                        </div>
                    </div>
                </div>
                <div class="col l6 gris6" style="margin-top: 35px;">
                    <img class="responsive-img" src="{{('img/contenidos/'.$c1->imagen)}}">
                </div>
            </div>
        </div>
    </section>

    <section id="banner">
        <div style="background: #333333; background-image: url('{{asset('img/banners/'.$banner->imagen)}}'); background-repeat: no-repeat; align-items: left; background-size: cover; background-position: center;">
            <div class="container">
                <div class="row" style="padding-top: 50px; padding-bottom: 50px;">
                    <div class="col l4">
                        <div class="fs38 blanco ff1">
                            <div class="fs36 lh38">
                            <em>
                                
                                {{$banner->titulo1}}
                            </em>
                            </div>
                        </div>
                    </div>
                    <div class="col l8">
                        <div class="fs18 blanco ff2">
                            {!!$banner->texto!!}
                            <a class="boton" href="{{route('solicitar-presupuesto')}}">INGRESAR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('page.template.footer')

</body>

</html>
<!-- Compiled and minified JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>



<script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>





<script>
    $(document).ready(function() {

        $('.slider').slider({

            indicators: true,
            height: 580,

        });

    });
        $(document).ready(function() {

        $('.sidenav').sidenav();

    });
</script>