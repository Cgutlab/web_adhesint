<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de Administrador | @yield('titulo')</title>

    <!-- Materialize Core CSS -->
    <link href="{{ asset('css/materialize/css/materialize.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css')}}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style type="text/css">
        .adm-estandar * {
            font-size: 14px !important;
            padding: 0;
            margin: 0;
            line-height: 20px
        }
    </style>
</head>

<body>
    <!-- Menu derecho -->
    <div class="row">
        <div id="nav-mobile" class="side-nav fixed col s3 z-depth-1" style="padding: 0; height: 100%; overflow-y: auto; position: fixed;" role="navigation">
            {{-- <img class="responsive-img hide-on-med-and-down" src="{{asset('img/logos/'.$header->imagen)}}"> --}}
            <ul class="collapsible z-depth-0">
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">home</i>Home</a>
                    <div class="collapsible-body">
                        <div><a href="{{ route('slider.create', ['seccion' => 'home']) }}">Crear Slider</a></div>
                        <div><a href="{{ route('slider.show', ['seccion' => 'home']) }}">Editar Slider</a></div>
                        <div><a href="{{ route('contenido.show', ['seccion' => 'home']) }}">Editar Contenidos</a></div>
                        <div><a href="{{ route('banner.show', ['seccion' => 'home']) }}">Editar Banner</a></div>
                    </div>
                </li>

                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">business</i>Empresa</a>
                    <div class="collapsible-body">
                        <div><a href="{{ route('slider.create', ['seccion' => 'empresa']) }}">Crear Slider</a></div>
                        <div><a href="{{ route('slider.show', ['seccion' => 'empresa']) }}">Editar Slider</a></div>
                        <div><a href="{{ route('contenido.show', ['seccion' => 'empresa']) }}">Editar Contenido</a></div>
                    </div>
                </li>

                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">style</i>Productos</a>
                    <div class="collapsible-body">
                        <div><a href="{{ route('slider.create', ['seccion' => 'productos']) }}">Crear Slider</a></div>
                        <div><a href="{{ route('slider.show', ['seccion' => 'productos']) }}">Editar Slider</a></div>
                        <div><a href="{{ route('productos_categorias.index') }}">Listado</a></div>
                    </div>
                </li>

    <li class="bold">
        <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">list</i>Marcas</a>
        <div class="collapsible-body">
            <div><a href="{{ route('marcas.create') }}">Crear Marca</a></div>
            <div><a href="{{ route('marcas.index') }}">Editar Marca</a></div>
        </div>
    </li>
    
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">reorder</i>Presentaciones</a>
                    <div class="collapsible-body">
                        <div><a href="{{ route('presentaciones.create') }}">Crear Presentacion</a></div>
                        <div><a href="{{ route('presentaciones.index') }}">Editar Presentaciones</a></div>
                    </div>
                </li>

                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">style</i>Aplicaciones</a>
                    <div class="collapsible-body">
                        <div><a href="{{ route('slider.create', ['seccion' => 'aplicaciones']) }}">Crear Slider</a></div>
                        <div><a href="{{ route('slider.show', ['seccion' => 'aplicaciones']) }}">Editar Slider</a></div>
                        <div><a href="{{ route('aplicaciones_categorias.index') }}">Listado</a></div>
                    </div>
                </li>

                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">contact_mail</i>Solicitar Presupuesto</a>
                    <div class="collapsible-body">
                        <div><a href="{{ route('slider.create', ['seccion' => 'presupuesto']) }}">Crear Slider</a></div>
                        <div><a href="{{ route('slider.show', ['seccion' => 'presupuesto']) }}">Editar Slider</a></div>
                        <div><a href="{{ route('contenido.show', ['seccion' => 'presupuesto']) }}">Editar Contenido</a></div>
                    </div>
                </li>
                {{--
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">texture</i>Inyección a Terceros</a>
                    <div class="collapsible-body">
                        <div><a href="{{ route('contenido.show', ['seccion' => 'inyeccion-a-terceros']) }}">Editar Contenido</a></div>
        <div><a href="{{ route('banner.show', ['seccion' => 'inyeccion-a-terceros']) }}">Editar Banner</a></div>
    </div>
    </li>

    <li class="bold">
        <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">email</i>Contacto</a>
        <div class="collapsible-body">
            <div><a href="{{ route('contenido.show', ['seccion' => 'contacto']) }}">Editar Contenido</a></div>
        </div>
    </li>
    --}}

    <li class="bold">
        <a class="collapsible-header waves-effect waves-admin"><i class="material-icons">event_available</i>Condiciones</a>
        <div class="collapsible-body">
            <div><a href="{{ route('contenido.show', ['seccion' => 'condiciones']) }}">Editar Contenido</a></div>
        </div>
    </li>




    {{--
    <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">remove_red_eye</i>Redes sociales</a>

        <div class="collapsible-body">

            <div<a href="{{ url('adm/redes/create') }}">Crear red social</a></div>

    <div><a href="{{ url('adm/redes/show') }}">Editar red social</a></div>

    </div>

    </li>
    --}}



    <li class="bold"><a class="collapsible-header <?php if(isset($logos_seccion)){echo($logos_seccion);} ?> waves-effect waves-admin"><i class="material-icons">collections</i>Logos</a>

        <div class="collapsible-body">

            <div class="<?php if(isset($logos_edit)){echo($logos_edit);} ?>"><a href="{{ url('adm/logos') }}">Editar logos</a>

            </div>

    </li>



    <li class="bold">

        <a class="collapsible-header <?php if(isset($datos_seccion)){echo($datos_seccion);} ?> waves-effect waves-admin"><i class="tiny material-icons">view_headline</i>Datos de la empresa</a>

        <div class="collapsible-body">

            <div class="<?php if(isset($datos_edit)){echo($datos_edit);} ?>"><a href="{{ url('adm/datos') }}">Editar datos</a></div>

        </div>

    </li>



    <li class="bold"><a class="collapsible-header <?php if(isset($metadatos_seccion)){echo($metadatos_seccion);} ?> waves-effect waves-admin"><i class="material-icons">pin_drop</i>Metadatos</a>

        <div class="collapsible-body">

            <div class="<?php if(isset($metadatos_edit)){echo($metadatos_edit);} ?>"><a href="{{ url('adm/metadatos') }}">Editar Metadatos</a></div>

        </div>

    </li>



    <li class="bold"><a class="collapsible-header <?php if(isset($usuarios_seccion)){echo($usuarios_seccion);} ?> waves-effect waves-admin"><i class="material-icons">account_circle</i>Usuarios</a>

        <div class="collapsible-body">

            <div class="<?php if(isset($usuarios_create)){echo($usuarios_create);} ?>"><a href="{{ url('adm/usuarios/create') }}">Crear Usuario</a></div>

            <div class="<?php if(isset($usuarios_edit)){echo($usuarios_edit);} ?>"><a href="{{ url('adm/usuarios') }}">Editar Usuario</a></div>

        </div>

    </li>







    </ul>

    </div>



    <div id="page-wrapper">

        <nav class="z-depth-0 col s9 push-s3" style="padding: 0;">

            <div class="nav-wrapper nave ">

                <ul class="hide-on-med-and-down" style="margin: 0 10%;">



                    <li>

                        <div style="font-size: 24px;">@yield('titulo')</div>

                    </li>

                </ul>



                <ul class="right hide-on-med-and-down" style="margin: 0 10%;">

                    <li><a class="dropdown-trigger" href="{{route('adm.logout')}}" data-target="dropdown1">Cerrar Sesión</a></li>

                </ul>

            </div>

        </nav>

        <div class="col s9 push-s3" style="padding: 40px;">

            @yield('cuerpo')

        </div>

    </div>

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="{{ asset('js/jquery.min.js')}}"></script>



    <!-- Materialize Core JavaScript -->

    <script src="{{ asset('css/materialize/js/materialize.min.js')}}"></script>



    <script type="text/javascript">
        $(document).ready(function()

            {

                $('.collapsible').collapsible();

            });
    </script>



    <script type="text/javascript">
        $('.confirmar').click(function(event) {

            if (!confirm('¿Esta seguro que desea borrar este registro?'))

            {

                event.preventDefault();

            }

        });
    </script>

</body>

</html>