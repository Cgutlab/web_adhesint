<header class="ff2">
    <div class="row" style="background: white;">
        <div class="container" style="width: 80%;">
            <a href="#" data-target="mobile-demo" class="gris6 sidenav-trigger fs14 hide-on-large-only"><i class="material-icons" style="margin-top: 4px;">menu</i></a>
        </div>
    </div>

    <div style="display: flex; justify-content: center;">
        <div class="row container" style="background: white; width: 80%; position: absolute; z-index: 3;">
            <div class="container" style="width: 90%;">
                <div class="row hide-on-med-and-down">
                    <div class="col l4">
                        <div style="display:flex; justify-content: left; align-items: center;">
                            <span style="margin-top: 35px;">
                                <a href="{{route('index')}}"><img class="responsive-img" src="{{asset('img/logos/'.$header->imagen)}}" alt=""></a>
                            </span>
                        </div>
                    </div>
                    <div class="col l8">
                        <div class="right gris6">
                            <a href="https://wa.me/{{$whatsapp->text}}" style="display:flex; justify-content: center; align-items: center; margin-top:3px;">
                                <img src="{{asset('img/whatsapp.png')}}" style="width: 18px;">
                                <span class="fw6 gris7">
                                    &nbsp;{{$whatsapp->text}}
                                </span>
                            </a>
                        </div>
                        <div class="flex flex-align right " style="width: 100%;height: 93px; justify-content: space-between;">
                            <div><a href="{{route('empresa')}}" class="bloque {{Request::is('empresa') ? 'bloqueActive' : ''}}">Empresa</a></div>
                            <div><a href="{{route('categorias')}}" class="bloque @if($active == 'productos') bloqueActive @endif">Productos</a></div>
                            <div><a href="{{route('aplicaciones')}}" class="bloque {{Request::is('aplicaciones') ? 'bloqueActive' : ''}}">Aplicaciones</a></div>
                            <div><a href="{{route('solicitar-presupuesto')}}" class="bloque {{Request::is('solicitar-presupuesto') ? 'bloqueActive' : ''}}">Solicitar&nbsp;Presupuesto</a></div>
                            <div><a href="{{route('contacto')}}" class="bloque {{Request::is('contacto') ? 'bloqueActive' : ''}}">Contacto</a></div>

                            <div class=""><a href="{{route('buscador')}}"><i class="material-icons" style="">search</i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{route('index')}}" style="{{Request::is('/') ? 'font-weight: bold' : ''}}">Inicio</a></li>
    <li><a href="{{route('empresa')}}" style="{{Request::is('empresa') ? 'font-weight: bold' : ''}}">Empresa</a></li>
    <li><a href="{{route('categorias')}}" style="{{Request::is('productos') ? 'font-weight: bold' : ''}}">Productos</a></li>
    <li><a href="{{route('aplicaciones')}}" style="{{Request::is('aplicaciones') ? 'font-weight: bold' : ''}}">Aplicaciones</a></li>
    <li><a href="{{route('solicitar-presupuesto')}}" style="{{Request::is('solicitar-presupuesto') ? 'font-weight: bold' : ''}}">Solicitar&nbsp;Presupuesto</a></li>
    <li><a href="{{route('contacto')}}" style="{{Request::is('contacto') ? 'font-weight: bold' : ''}}">Contacto</a></li>
</ul>
