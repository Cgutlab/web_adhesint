<!DOCTYPE html>
<html lang="es">

<head>

    @include('page.template.metas')
    @include('page.template.links')

    <style media="screen">
        #columnas p::before {
            content: url('{{asset('img/view.jpg')}}');
            margin-right: 5px;
        }

        @media only screen and (min-width: 600px) {
            #columnas {
                column-count: 2;
            }
        }
    </style>
</head>

<body>
    @include('page.template.header')
    @include('page.template.slider')

    <div class="container ff2" style="width: 82%;margin-bottom: 50px;">
        <div class="row">
            <div class="row" style="margin-bottom: 50px; margin-top: 0px;">
                <div class="col l12" style="color: color: #595959!important;">
                    <a href="{{route('categorias')}}" style="color: #595959!important;" class="fw5">Categorias</a>&nbsp;|&nbsp;
                    <a href="{{route('productos', $item->categorias->id)}}" style="color: #595959!important;" class="fw5">{!!$item->categorias->titulo!!}</a>&nbsp;|&nbsp;
                    <a href="{{route('producto', $item->id)}}" style="color: #595959!important;" class="fw5">{!!$item->titulo!!}</a>
                </div>
            </div>
            <div class="col l3 s12">
                <ul class="collapsible z-depth-0" style="border: 0;">
                    @foreach($categorias as $categoria)
                    <li class="@if($item->id_categoria == $categoria->id) active @endif">
                        <div class="collapsible-header colorCat">
                            <div class="active fs16 @if($item->id_categoria == $categoria->id) azul fw6 @else gris6 @endif">{!!$categoria->titulo !!}</div>
                        </div>
                        <div class="collapsible-body noPadNS active">
                            @foreach($productos as $producto)
                            @if($producto->id_categoria == $categoria->id)
                                <ul class="collapsible z-depth-0 noPadNS" style="border: 0;">
                                    <a class=" fs14 @if($item->id == $producto->id) azul fw6 @else gris6 @endif" href="{{route('producto',$producto->id)}}">{!!$producto->titulo
                                    !!}</a>
                                </ul>
                                @endif
                                @endforeach
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="row">
                    <div style="margin-left: 20px; margin-top: 50px;" target="_blank">
                        <a href="tel:{{$telefono->text}}">
                            <img class="responsive-img" src="{{asset('img/llamada.jpg')}}" alt="">
                        </a>
                    </div>
                    <div style="margin-left: 20px; margin-top: 15px;" target="_blank">
                        <a href="sms:{{$telefono2->text}}">
                            <img class="responsive-img" src="{{asset('img/mensaje.jpg')}}" alt="">
                        </a>
                    </div>
                   <div style="margin-left: 20px; margin-top: 15px;">
                       <a href="https://wa.me/{{$telefono2->text}}" target="_blank">
                            <img class="responsive-img" src="{{asset('img/whatsapp.jpg')}}" alt="">
                       </a>
                    </div>
                </div>
            </div>

            <div class="col l9 s12">
                <div class="col l6 s12">
                    <div class="slider">
                        <ul class="slides">
                            @if($item->imagen)
                                <li><img src="{{asset('img/gallery_productos/'.$item->imagen)}}" style="width:100%;"></li>
                                @endif
                                @if($item->imagen1)
                                    <li><img src="{{asset('img/gallery_productos/'.$item->imagen1)}}" style="width:100%;"></li>
                                    @endif
                                    @if($item->imagen2)
                                        <li><img src="{{asset('img/gallery_productos/'.$item->imagen2)}}" style="width:100%;"></li>
                                        @endif
                                        @if($item->imagen3)
                                            <li><img src="{{asset('img/gallery_productos/'.$item->imagen3)}}" style="width:100%;"></li>
                                            @endif
                                            @if($item->imagen4)
                                                <li><img src="{{asset('img/gallery_productos/'.$item->imagen4)}}" style="width:100%;"></li>
                                                @endif
                                                @if($item->imagen5)
                                                    <li><img src="{{asset('img/gallery_productos/'.$item->imagen5)}}" style="width:100%;"></li>
                                                    @endif
                                                    @if($item->imagen6)
                                                        <li><img src="{{asset('img/gallery_productos/'.$item->imagen6)}}" style="width:100%;"></li>
                                                        @endif
                        </ul>
                    </div>
                </div>

                <div class="col s12 l6">
                    <div class="gris6 fs28 fw6">{!!$item->titulo!!}</div>
                    <div class="gris6 fs17 fw4">{!!$item->caption1!!}</div>
                    <div class="gris6 fs17 fw4">{!!$item->texto!!}</div>
                    @if($item->ficha)
                        <div style="margin-top: 20px;margin-bottom: 5px;"><a target="_blank" class="boton" href="{{asset('img/gallery_productos/'.$item->ficha)}}">Descargar PDF</a> </div>
                        @endif
                </div>

                <div class="col s12">
                    <div class="fs15 fw7 azul" style="margin-bottom: 15px;">PRINCIPALES MARCAS</div>
                    <div class="row" style="margin-bottom: 15px;">
                        @foreach($item->marcas->sortBy('orden') as $marcas)
                            <div class="col s3">
                                <img class="responsive-img" src="{{asset('img/marcas/'.$marcas->imagen)}}" alt="">
                            </div>
                            @endforeach
                    </div>
                </div>

                <div class="col s12">
                    <div class="fs15 fw7 azul" style="margin-bottom: 5px;">CARACTERÍSTICAS</div>
                    <div id="columnas" style="margin-bottom: 15px;">
                        {!!$item->caption!!}
                        <br>
                    </div>
                </div>

                <div class="col s4">
                    <div class="fs15 fw7 azul" style="margin-bottom: 15px;">PRESENTACIÓN</div>
                    <table>
                        @foreach($item->presentaciones->sortBy('orden') as $present)
                            <tr>
                                <td style="border-right: 1px solid rgba(0, 0, 0, 0.12);"><img src="{{asset('img/presentacion/'.$present->imagen)}}" alt=""></td>
                                <td class="fs15 gris7 fw6">{{$present->titulo}}</td>
                                <td class="fs22 gris9 fw7">{{$present->peso}}</td>
                            </tr>
                            @endforeach
                    </table>
                </div>


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