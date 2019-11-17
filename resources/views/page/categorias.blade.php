<!DOCTYPE html>
<html lang="es">

<head>
    @include('page.template.metas')
    @include('page.template.links')
</head>

<body>
    @include('page.template.header')
    @include('page.template.slider')

    <section id="productos">
        <div class="container" style="width: 80%;">
            <div class="row center-align" style="margin-top: 35px; margin-bottom: 35px; ">
                @foreach($categorias as $destacado)
                <div class="col s12 l4" style="position: relative;">
                    <div class="card z-depth-0" style=" background: #F6F6F6;">
                        <div class="card-image center-align">
                            <a href="{{route('productos', $destacado->id)}}" class="naranja fs20" style="">
                                <div class="efecto" style="">
                                    <span class="central">
                                    <div class="fs26 fw5 ff2 blanco" style="text-shadow: 1px 1px 4px #585858;">{!!($destacado->titulo)!!}</div>
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
    </section>

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
