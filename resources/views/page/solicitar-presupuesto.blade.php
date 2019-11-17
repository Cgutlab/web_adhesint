<!DOCTYPE html>
<html lang="es">

<head>
    @include('page.template.metas')
    @include('page.template.links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

</head>

<body>

    @include('page.template.header')

    <div style="position: absolute; z-index: 4; top:18%; width: 100%;">
        <section id="advertingse">
            <div class="container center-align">
                @if(session('error'))
                <div class="col s12 card-panel red lighten-4 red-text text-darken-4">
                    {{ session('error') }}
                </div>
                @endif
                @if(session('success'))
                <div class="col s12 card-panel lighten-4 green-text text-darken-4" style="background: #03A9F4;">
                    Enviado{{ session('success') }}
                </div>
                @endif
            </div>
            <?php
              if(isset($_GET['mensaje'])){
                  if($_GET['mensaje']=="ok"){ ?>
            <div class="alert alert-success text-center" role="alert" style="background: #007E00; border-bottom: 1px solid gray;">
                <?php echo "¡El mensaje se envió correctamente!" ?>
            </div>
            <?php }else{ ?>
            <div class="alert alert-danger text-center" role="alert" style="background: orange; border-bottom: 1px solid gray;">
                <?php echo "¡Error al enviar el mensaje!"?>
            </div>
            <?php }
              }
              ?>
        </section>

        <section id="solicitar-presupuesto" style="margin-top: 20px;">
            <div class="container center-align">
                {!!Form::open(['route'=>'enviarpresupuesto', 'method'=>'POST', 'files' => true])!!}
                {{-- <form action="{{route('enviarpresupuesto')}}" method="post" enctype="multipart/form-data"> --}}
                {{ csrf_field() }}
                <div id="estado1">
                    <div class="row">
                        <div class="col s12 center">
                            <img class="responsive-img" src="{{ asset('img/presupuesto/sp1.png')}}" style="height: 140px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l6 s12">
                            <input type="text" name="nombre" class="validate">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input type="text" name="localidad" class="validate">
                            <label for="localidad">Localidad</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input type="text" name="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col l6 s12">
                            <input type="text" name="telefono" class="validate">
                            <label for="telefono">Teléfono</label>
                        </div>
                        <div class="input-field col l6 s12 right">
                            <a class="btn waves-light z-depth-0 right" id="botonSiguienteEstado" style="background-color: #03A9F4; padding: 0px 50px 35px 50px; color: white; font-weight: bold; border: 3px solid #03A9F4; border-radius: 25px;">Siguiente</a>
                        </div>
                    </div>
                </div>
                <div id="estado2" class="hide">
                    <div class="row">
                        <div class="col s12">
                            <div align="center">
                                <img class="responsive-img" src="{{ asset('img/presupuesto/sp2.png')}}" style="height: 140px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field">
                                <textarea id="mensaje" name="mensaje" class="materialize-textarea validate" style="margin-top:35px;"></textarea>
                                <label for="mensaje">Mensaje</label>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="btn" style="background: #03A9F4;">
                                        <span>Ficha PDF</span>
                                        {!! Form::file('imagen') !!}
                                    </div>
                                    <div class="file-path-wrapper">
                                        {!! Form::text('',null, ['class'=>'file-path validate', 'placeholder' => 'Adjuntar archivo']) !!}
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="fs14 left-align" style="color: #AAAAAF;">
                                    {!!$presupuesto1->text!!}
                                </div>

                            </div>
                            <div class="row">
                                <div class="left">
                                    <a class="btn waves-light z-depth-0 right" id="botonEstadoAnterior" style="background-color: inherit; padding: 0px 50px 35px 50px; color: #03A9F4; font-weight: bold; border: 3px solid #03A9F4; border-radius: 25px;">ANTERIOR</a>
                                </div>
                                <div class="right">
                                    <button type="submit" class="btn waves-light z-depth-0 right" id="botonEstadoAnterior" style="background-color: #03A9F4; padding: 0px 50px 35px 50px; color: white; font-weight: bold; border: 3px solid #03A9F4; border-radius: 25px;">ENVIAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/materialize.min.js"></script>
            <script>
                document.getElementById("botonSiguienteEstado").addEventListener("click", mostrarEstado2);
                document.getElementById("botonEstadoAnterior").addEventListener("click", mostrarEstado1);

                function mostrarEstado2() {
                    document.getElementById("estado1").className = "animated bounceOutLeft";
                    setTimeout(function() {
                        document.getElementById("estado1").style.display = "none";
                        document.getElementById("estado2").style.display = "block";
                        document.getElementById("estado2").className = "animated bounceInRight";

                        document.getElementById("elDiv1").className = "paso datos col m2 col l2 offset-m1";
                        document.getElementById("elDiv2").className = "paso obra active col m4 col l4 push-l3";
                    }, 1);
                }

                function mostrarEstado1() {
                    document.getElementById("estado2").className = "animated bounceOutLeft";

                    setTimeout(function() {
                        document.getElementById("estado2").style.display = "none";
                        document.getElementById("estado1").style.display = "block";
                        document.getElementById("estado1").className = "animated bounceInRight";

                        document.getElementById("elDiv1").className = "paso datos active col m2 col l2 offset-m1";
                        document.getElementById("elDiv2").className = "paso obra col l2 col m4 col l4 push-l3";
                    }, 1);
                }

                function animacion(id, clase) {
                    $(id).removeClass("animated " + clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        $(this).removeClass("animated " + clase);
                    });
                };
            </script>

        </section>
    </div>

    <div class="slider">
        <ul class="slides">
            @foreach($sliders as $slider)
            <li style="border-bottom: 0;">
                <img src="{{ asset('img/sliders/'.$slider->imagen) }}">
                <div class="caption" style="">
                    <div class="center-align hide-on-med-and-down" style="padding-top:30px;">
                        <span class="lts blanco fw6 fs30 editorRico">{!!$slider->titulo!!}</span>
                        <span class="lts gris6 fs18 editorRico">{!!$slider->subtitulo!!}</span>
                    </div>
                    <div class="center-align hide-on-large-only">
                        <span class="lts azul">{!!$slider->titulo!!}</span>
                        <span class="lts gris6">{!!$slider->subtitulo!!}</span>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>




    @include('page.template.footer')

</body>

</html>
@include('page.template.scripts')

<script>
    $(document).ready(function() {
        $('.slider').slider({
            height: 640,
            indicators: false,
        });
    });

    $(document).ready(function() {

        $('select').formSelect();

    });
</script>