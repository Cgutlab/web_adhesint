<!DOCTYPE html>
<html lang="es">

<head>
    @include('page.template.metas')
    @include('page.template.links')

    <style>
        .select-wrapper input.select-dropdown {
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            border: 1px solid #AFB1B2;
            padding: 0;
            color: #0058A8;
            font-weight: 500;
        }

        .dropdown-content li>a,
        .dropdown-content li>span {
            color: #595959;
        }
    </style>
</head>

<body>
    @include('page.template.header')
    {!!Form::open(['route'=>'aplicacion', 'method'=>'POST', 'files' => true])!!}
    <section id="buscador" style="background:#F6F6F6;">
        @include('page.template.slider')

        <div class="container" style="width: 82%; margin-top: -20px; margin-bottom: 35px;">
            <div class="row">
                <div class="col l5 s12">
                    <div class="input-field col s12" style="">
                        <select name="categoria" required id="categoria">
                            <option value="" disabled selected>&nbsp;&nbsp;Sectores</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" @if($categoria->id == $aplicacion->id_categoria) selected @endif>&nbsp;&nbsp;{{$categoria->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col l5 s12">
                    <div class="input-field col s12">
                      <select name="producto" id="producto">
                        <option value="" disabled selected>&nbsp;&nbsp;Aplicación</option>
                      </select>
                    </div>
                </div>

                <div class="col l2 s12 center-align" style="margin-top: 18px; z-index: 999;">
                    <!-- <a class="boton" href="">BUSCAR</a> -->
                    {!!Form::submit('BUSCAR', ['class' => 'fs14', 'style' => 'height: 42px; width: 130px; border: 0; color: white; background: #03A9F4; border-radius: 15px;'])!!}
                </div>
            </div>
        </div>
    </section>
    {!!Form::close()!!}

    <section id="productos">
        <div class="container" style="width: 82%;">
            <div class="row">
                <div class="col l4 s12">
                    <img class="responsive-img" src="{{asset('img/gallery_aplicacion/'.$aplicacion->imagen)}}" alt="">
                </div>
                <div class="col l5 s12">
                    <div style="margin-left: 20px; margin-top 20px;">
                        <div class="fs28 gris6 fw7">{{$aplicacion->titulo}}</div>
                        <div class="fs20 gris6 fw4">{!!$aplicacion->texto!!}</div>
                    </div>
                </div>
                <div class="col l3 s12">
                    <div style="margin-left: 20px; margin-top: 15px;" target="_blank">
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
        </div>
    </section>

    <section id="productos">
        <div class="container" style="width: 82%; margin-top: 30px; margin-bottom: 35px;">
            <div class="row">
                <div class="col s12 fw6" style="color: #12389B;">
                    PRODUCTOS PRINCIPALES
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                @foreach($aplicacion->relacionados as $relacion)
                    <div class="col s12 l3" style="position: relative;">
                        <div class="card z-depth-0" style=" background: #F6F6F6;">
                            <div class="card-image center-align">
                                <a href="{{route('producto', $relacion->id)}}" class="naranja fs20" style="">
                                    <div class="efecto" style="">
                                        <span class="central">
                                            <div class="fs20 fw6 blanco" style="text-shadow: 1px 1px 4px #585858;">{!!($relacion->titulo)!!}</div>
                                        </span>
                                        <!-- <i class="material-icons">add</i> -->
                                    </div>
                                    <img src="{{('img/gallery_productos/'.$relacion->imagen)}}" style="border: 1px solid #DDD;width: 100%; height: 100%;">
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
    const categoria = document.querySelector('#categoria')
    const producto = document.querySelector('#producto')

    categoria.addEventListener('change', function() {
        fetch('/adhesint/AplicacionSelect/' + this.value)
            .then( data => data.json())
            .then( json => {
                if (json.length > 0) {
                    producto.innerHTML = '<option value="" disabled selected>&nbsp;&nbsp;Aplicación</option>'
                    json.forEach( v => {
                        producto.innerHTML += `
                               <option value="${v.id}">&nbsp;&nbsp;${v.titulo}</option>
                    `
                    })
                    $('select').formSelect();
                }
            })
            .catch(err => console.error(err))
    })


</script>
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