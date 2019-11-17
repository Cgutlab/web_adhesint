<!DOCTYPE html>
<html lang="es">

<head>

    @include('page.template.metas')
    @include('page.template.links')

</head>

<body>

    @include('page.template.header')
    @include('page.template.slider')

    <div class="container ff2" style="width: 82%; margin-bottom: 50px;">
        <div class="row" style="margin-bottom: 50px; margin-top: 0px;">
            <div class="col l12" style="color: color: #595959!important; ">
                <a href="{{route('categorias')}}" style="color: #595959!important;" class="fw5">Categor&iacute;as</a>&nbsp;|&nbsp;
                <a href="{{route('productos', $item->id)}}" style="color: #595959!important;" class="fw5">{!!$item->titulo!!}</a>
            </div>
        </div>
        <div class="row">
            <div class="col l3 s12">
                <ul class="collapsible z-depth-0" style="border: 0;">
                    @foreach($categorias as $categoria)
                    <li class="@if($item->id == $categoria->id) active @endif">
                        <div class="collapsible-header colorCat">
                            <div class="active fs16 @if($item->id == $categoria->id) azul fw6 @else gris6 @endif">{!!$categoria->titulo!!}</div>
                        </div>
                        <div class="collapsible-body noPadNS active">
                            @foreach($productos as $producto)
                            @if($producto->id_categoria == $categoria->id)
                                <ul class="collapsible z-depth-0 noPadNS" style="border: 0;">
                                    <a class="gris6 fs14" href="{{route('producto',$producto->id)}}">{!!$producto->titulo!!}</a>
                                </ul>
                                @endif
                                @endforeach
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col l9 s12">
                @foreach($productox as $producto)
                <div class="col s12 l4" style="position: relative;">
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