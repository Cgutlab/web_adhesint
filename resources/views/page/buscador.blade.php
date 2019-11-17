<!DOCTYPE html>
<html lang="es">

<head>

    @include('page.template.metas')
    @include('page.template.links')

</head>

<body>

    @include('page.template.header')

    <div class="slider" style="margin-bottom:-40px;">
        <ul class="slides">
            @foreach($sliders as $slider)
            <li style="border-bottom: 0;">
                <img src="{{ asset('img/sliders/'.$slider->imagen) }}">
            </li>
            @endforeach
        </ul>
    </div>

    {!!Form::open(['route'=>'buscando', 'method'=>'POST', 'files' => true])!!}
    <div class="container" style="width: 80%;">
        <div class="row" style="width:80%; position: absolute; z-index: 2; top: 30%;">
            <div class="offset-l4 col l4 s12">
                <div class="input-field col s12" style="padding-left: 5px;">
                @if(isset($busqueda))
                {!!Form::label('Buscar')!!}
                {!!Form::text('busqueda', $busqueda,['class'=>'validate', 'required', 'style' => '
                    background-color: rgba(255,255,255,0.5);
                    border-radius: 5px;
                    border: 1px solid #AFB1B2;
                    padding: 0;
                    padding-left: 5px;
                    color: #0058A8;
                    font-weight: 500;
                '])!!}
                @else
                {!!Form::label('Buscar')!!}
                {!!Form::text('busqueda', null,['class'=>'validate', 'required', 'style' => '
                    background-color: rgba(255,255,255,0.5);
                    border-radius: 5px;
                    border: 1px solid #AFB1B2;
                    padding: 0;
                    padding-left: 5px;
                    color: #0058A8;
                    font-weight: 500;
                '])!!}
                @endif
                </div>
            </div>
            <div class="col l2 s12 center-align" style="margin-top: 18px;">
                <!-- <a class="boton" href="">BUSCAR</a> -->
                {!!Form::submit('BUSCAR', ['class' => 'fs14', 'style' => 'height: 42px; width: 130px; border: 0; color: white; background: #03A9F4; border-radius: 35px;'])!!}
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    
    @if(isset($busqueda))
    <div class="container" style="width: 100%; margin-top: 40px; margin-bottom: 40px;">
        <div class="row">
            <div class="col l12 s12">
                @foreach($productos as $producto)
                <div class="col s12 l3" style="position: relative;">
                    <div class="card z-depth-0" style="background: #F6F6F6;">
                        <div class="card-image center-align">
                            <a href="{{route('producto', $producto->id)}}" class="fs20" style="">
                                <div class="efecto" style="">
                                    <span class="central">
                                        <div class="fs20 fw6 blanco" style="text-shadow: 1px 1px 4px #585858;">{!!($producto->titulo)!!}</div>
                                    </span>
                                    <!-- <i class="material-icons">add</i> -->
                                </div>
                                <img src="{{asset('img/gallery_productos/'.$producto->imagen)}}" style="border: 1px solid #DDD;width: 100%; height: 100%;">
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @include('page.template.footer')

</body>

</html>
@include('page.template.scripts')
<script>
    $(document).ready(function() {

        $('.datepicker').datepicker({

            format: 'dd-mm-yyyy',

            selectYears: 200,

            min: new Date(2018, 11, 23),

            max: new Date(2080, 12, 31)

        });

    });



    $(document).ready(function() {

        $('select').formSelect();

    });
</script>