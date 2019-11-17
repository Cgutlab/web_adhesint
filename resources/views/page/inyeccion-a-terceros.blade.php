<!DOCTYPE html>
<html lang="es">

<head>

    @include('page.template.metas')
    @include('page.template.links')

</head>

<body>

    @include('page.template.header')

    <section id="contenido">
        <div class="center-align">
            <div class="container" style="width: 80%; margin-top: 35px; margin-bottom: 50px;">
                <div class="row">
                    <div class="fs38 rojo lts" style="margin-bottom: 5px;">{!!$contenido->titulo1!!}</div>
                    <div class="fs24 gris7 editorRico" style="letter-spacing: 1.5px;">{!!$contenido->caption1!!}</div>
                    <div class="col l6">
                        <div class="fs18 gris6 editorRico yp25" style="text-align: left;">{!!$contenido->text1!!}</div>
                    </div>
                    <div class="col l6">
                        <div class="fs18 gris6 editorRico yp25" style="text-align: left;">{!!$contenido->text2!!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="banner">
        <div style="background: #333333; background-image: url('{{asset('img/banners/'.$banner->imagen)}}'); background-repeat: no-repeat; align-items: left; background-size: cover; background-position: center;">
            <div class="container" style="width: 80%; margin-top: 35px; padding-top: 80px; padding-bottom: 80px;">
                <div class="row">
                    <div class="offset-l8 col l4 s12">
                        <div class="row" style="margin-bottom: 35px;">
                            <div class="col l2">
                                <img src="{{asset('img/ico1.png')}}" alt="">
                            </div>
                            <div class="col l10">
                                <div class="fs18 blanco lts">{!!$banner->item1!!}</div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 35px;">
                            <div class="col l2">
                                <img src="{{asset('img/ico2.png')}}" alt="">
                            </div>
                            <div class="col l10">
                                <div class="fs18 blanco lts">{!!$banner->item2!!}</div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 35px;">

                            <div class="col l2">
                                <img src="{{asset('img/ico3.png')}}" alt="">
                            </div>
                            <div class="col l10">
                                <div class="fs18 blanco lts">{!!$banner->item3!!}</div>
                            </div>
                        </div>
                    </div>
                </div>
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