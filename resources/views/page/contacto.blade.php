<!DOCTYPE html>

<html lang="es">

<head>



    @include('page.template.metas')

    @include('page.template.links')

</head>

<body>

    @include('page.template.header')

    <section id="ubicacion">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.579895108718!2d-58.55431188458935!3d-34.69055086960506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc8a11acf9633%3A0xe7fb08e5b242bf20!2sAdhesint+srl!5e0!3m2!1ses!2sar!4v1548179617830"
          width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>

    <section id="contacto" style="margin-bottom: 80px;">
        <div class="container">
            <div class="row" style="margin-top: 50px;">
                <div class="col l4 fs17">
                    <div class="row" style="margin-bottom: 15px; margin-top: 20px;">
                        <div class="col s1"><i class="material-icons fs20 celeste">location_on</i></div>
                        <div class="col s11"><a target="_blank" href="https://www.google.com/maps/search/{{$direccion->text}}" class="celesteH fs17">{{$direccion->text}}</a></div>
                    </div>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col s1"><i class="material-icons fs20 celeste">phone_in_talk</i></div>
                        <div class="col s11"><a href="tel:{{$telefono->text}}" class="celesteH fs17">{{$telefono->text}}</a></div>
                    </div>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col s1"><i class="material-icons fs20 celeste">email</i></div>
                        <div class="col s11"><a href="mailto:{{$correo->text}}" class="celesteH fs17">{{$correo->text}}</a></div>
                    </div>
                </div>
                <div class="col l8">
                    {!!Form::open(['route'=>'contacto.enviar', 'method'=>'POST'])!!}
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s6">
                                {!!Form::label('Nombre')!!}
                                {!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}
                            </div>
                            <div class="input-field col s6">
                                {!!Form::label('Apellido')!!}
                                {!!Form::text('apellido',null,['class'=>'validate', 'required'])!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                {!!Form::label('Email')!!}
                                {!!Form::text('email',null,['class'=>'validate', 'required'])!!}
                            </div>
                            <div class="input-field col s6">
                                {!!Form::label('Telefono')!!}
                                {!!Form::email('telefono',null,['class'=>'validate', 'required'])!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field">
                                    {!!Form::label('Mensaje')!!}
                                    {!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea'])!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l6 m12">
                                <div class="g-recaptcha" data-sitekey="6Ldco1gUAAAAAKKt7QO7vSn4tkahcQuMBXAHTeRj"></div>
                            </div>
                            <div class="col l6 m12">
                                <label>
                                    <input type="checkbox" name="acepto" required />
                                    <span>
                                        <a href="#modal1" class="modal-trigger" style="color:#494949;">
                                            <div class="fs15 gris15">Acepto los términos y condiciones de privacidad</div>
                                        </a>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col s12" style="margin-top: 25px;">
                            <div class="col s12 no-padding">
                                  <button type="submit" class="btn waves-light z-depth-0 left" id="botonEstadoAnterior" style="background-color: #03A9F4; padding: 0px 50px 35px 50px; color: white; font-weight: bold; border: 3px solid #03A9F4; border-radius: 25px;">ENVIAR</button>
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </section>



    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Términos y condiciones</h4>
            <p>{!! $contenido->text1 !!}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    @include('page.template.footer')



</body>

</html>



@include('page.template.scripts')



<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>



<script type="text/javascript">
    $(document).ready(function() {

        $('.modal').modal();

    });

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