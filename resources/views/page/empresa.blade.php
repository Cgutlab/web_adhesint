<!DOCTYPE html>
<html lang="es">

<head>

    @include('page.template.metas')
    @include('page.template.links')

</head>

<body>

    @include('page.template.header')
    @include('page.template.slider')

    <section class="ff2">
        <div class="center-align">
            <div class="container" style="width: 80%; margin-top: 35px; margin-bottom: 50px;">
                <div class="row">
                    <div class="col l6">
                        <div>
                            {!!$contenido->caption2!!}
                        </div>
                        <div class="">
                            <img class="responsive-img" src="{{asset('img/contenidos/'.$contenido->imagen)}}" alt="">
                        </div>
                    </div>
                    <div class="col l6">
                        <div class="fs18 fw4 gris6 editorRico" style="text-align: left;">{!!$contenido->text1!!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ff2">
        <div class="">
            <div class="container" style="width: 80%; margin-top: 35px; margin-bottom: 50px;">
                <div class="row">
                    <div class="col l6">
                        <div class="card z-depth-0" style="height: 220px; overflow: hidden; padding: 25px; background: #F9F9F9; border: 1px solid #C6C6C6; color: #595959; border-top: 2px solid #163D88;">
                            <div class="fs20 celeste fw6">Visión</div>
                            <div class="fs18 gris6">Continuar con nuestro desarrollo y crecimiento. Consolidar nuestra empresa como proveedor de servicios integrales y productos de la más alta calidad, priorizando siempre la satisfacción completa de
                                nuestros
                                clientes.</div>
                        </div>
                        <div class="">
                            <img class="responsive-img" src="" alt="">
                        </div>
                    </div>
                    <div class="col l6">
                        <div class="card z-depth-0" style="height: 220px; overflow: hidden; padding: 25px; background: #F9F9F9; border: 1px solid #C6C6C6; color: #595959; border-top: 2px solid #163D88;">
                            <div class="fs20 celeste fw6">Misión</div>
                            <div class="fs18 gris6">Nuestra misión es que Adhesint, sea una compañía dedicada a exceder las expectativas de nuestros clientes, con calidad y servicio. Trabajamos con nuestro equipo de profesionales asumiendo un
                                compromiso de excelencia.</div>
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