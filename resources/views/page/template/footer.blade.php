<footer style="background: #F2F2F2;">
    <div class="container fs14 ff2" style="width: 80%; padding: 25px 0; background-image: url('{{asset('img/logos/fondo-footer.png')}}'); background-repeat: no-repeat; align-items: left; background-position: left;">
        <div class="row fw6" style="border-bottom: 1px solid #646464;">
            <div class="col l4 s12">
            <div  style="display: flex; justify-content: center; align-items: center; height: 150px;">
                <img class="responsive-img" src="{{asset('img/logos/'.$footer->imagen)}}">
            </div>
            </div>
            <div class="col offset-l1 l3 s12">
                <div class="row s12" style="margin-bottom: 15px;">
                    <div class="col l12 s12" style="margin-bottom: 15px;">
                        <div class="azul bold lts fw7">SECCIONES</div>
                    </div>
                    <div class="col l5 s6">
                        <div class="mt5"><a class="navBlanco lts" href="{{route('index')}}">Inicio</a></div>
                        <div class="mt5"><a class="navBlanco lts" href="{{route('empresa')}}">Empresa</a></div>
                        <div class="mt5"><a class="navBlanco lts" href="{{route('categorias')}}">Productos</a></div>
                    </div>
                    <div class="col l7 s6">
                        <div class="mt5"><a class="navBlanco lts" href="{{route('aplicaciones')}}">Aplicaciones</a></div>
                        <div class="mt5"><a class="navBlanco lts" href="{{route('solicitar-presupuesto')}}">Solicitar&nbsp;Presupuesto</a></div>
                        <div class="mt5"><a class="navBlanco lts" href="{{route('contacto')}}">Contacto</a></div>
                    </div>
                </div>
            </div>
            <div class="col offset-l1 l3 s12">
                <div class="row">
                    <div class="row s12" style="margin-bottom: 15px;">
                        <div class="col l12">
                            <div class="azul bold lts fw7">ADHESINT S.R.L.</div>
                        </div>
                    </div>
                    <div class="row s12">
                        <div class="col l2">
                            <i class="material-icons celeste">location_on</i>
                        </div>
                        <div class="col l10">
                            <a class="navBlanco" href="https://www.google.com/maps/search/{{$direccion->text}}">{{$direccion->text}}</a>
                        </div>
                    </div>
                    <div class="row s12">
                        <div class="col l2">
                            <i class="material-icons celeste">phone_in_talk</i>
                        </div>
                        <div class="col l10">
                            <a class="navBlanco" href="tel:{{$telefono->text}}">{{$telefono->text}}</a> <br>
                            <a class="navBlanco" href="tel:{{$telefono2->text}}">{{$telefono2->text}}</a>
                        </div>
                    </div>
                    <div class="row s12">
                        <div class="col l2" style="padding: 0;">
                            <img src="{{asset('img/whatsapp.png')}}" style="width: 40px; margin-left: 5px;">
                        </div>
                        <div class="col l10" style="padding-top: 7px;">
                            <a class="navBlanco" href="https://wa.me/{{$whatsapp->text}}">{{$whatsapp->text}}</a>
                        </div>
                    </div>
                    <div class="row s12">
                        <div class="col l2">
                            <i class="material-icons celeste">send</i>
                        </div>
                        <div class="col l10">
                            <a class="navBlanco" href="mailto:{{$correo->text}}">{{$correo->text}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="col l12">
                <a class="azul bold fs11 lts">By osole</a>
            </div>
        </div>
    </div>
</footer>