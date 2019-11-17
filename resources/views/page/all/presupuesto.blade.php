@php
/*
 SOLICITUD DE PRESUPUESTO
  routes\web.php
    Route::get('presupuesto', ['uses' => 'page\PresupuestoController@index', 'as' => 'presupuesto']);
    Route::post('presupuesto/enviar', ['uses' => 'page\PresupuestoController@enviarMail', 'as' => 'presupuesto.enviar']);
  
  app\Mail\Presupuesto.php
  app\Http\Controllers\page\PresupuestoController.php
* resources\views\page\presupuesto.blade.php
  resources\views\page\solicitud.blade.php
*/
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Alambrados Prix</title>
  <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/materialize/materialize.min.css') }}" rel="stylesheet">

    <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>
<body>
@include('page.template.header')



<div align="center">
<?php
if(isset($_GET['mensaje'])){
    if($_GET['mensaje']=="ok"){ ?>

        <div class="alert alert-success text-center" role="alert" style="background: #007E00; border-bottom: 1px solid gray;">
            <?php echo "¡El mensaje se envió correctamente!" ?>
        </div>

    <?php }else{ ?>

        <div class="alert alert-danger text-center" role="alert"  style="background: orange; border-bottom: 1px solid gray;">
            <?php echo "¡Error al enviar el mensaje!"?>
        </div>

    <?php }
}
?>
</div>
{!!Form::open(['route'=>'presupuesto.enviar', 'method'=>'POST', 'files' => true])!!}
<div class="container" style="margin-bottom: 100px;">
    <div class="row" style="margin-top: 100px;">
        <div id="estado1" >
            <div class="col l12">
                <div align="center">
                    <img style="align-items: center;" src="{{asset('imagenes/help/presupuesto1.jpg')}}">
                    <div class="col l7">
                        <span class="fs20 cv20">
                        <b>TUS DATOS</b>
                        </span>
                    </div>
                    <div class="col l3">
                        <span class="fs20">
                        TU OBRA
                        </span>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="input-field col l5 push-l1">
                        <input type="text" id="nombre" name="nombre"  class="validate">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col l5 push-l1">
                        <input type="text" id="localidad" name="localidad"  class="validate">
                        <label for="localidad">Localidad</label>
                    </div>
                    <div class="input-field col l5 push-l1">
                        <input type="text" id="email" name="email"  class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col l5 push-l1">
                        <input type="text" id="telefono" name="telefono"  class="validate">
                        <label for="telefono">Teléfono</label>
                    </div>
                    <div class="input-field col l3 pull-l1 right">
                        <a type="submit" id="botonSiguienteEstado" class="btn right z-depth-0" style="margin-top: 20px; background-color:#DE2007; color:white; font-weight: bold;">Siguiente</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="estado2" style="display: none;">
        <div class="col l12">
            <div align="center">
                <img style="align-items: center;" src="{{asset('imagenes/help/presupuesto2.jpg')}}">
                <div class="col l7">
                    <span class="fs20">
                    TUS DATOS
                    </span>
                </div>
                <div class="col l3">
                    <span class="fs20 cv20">
                    <b>TU OBRA</b>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l5 push-l1">
                    <textarea id="mensaje" name="mensaje"  class="materialize-textarea validate"></textarea>
                    <label for="mensaje">Mensaje</label>
                </div>
                <div align="right">
                  <div class="file-field col l5 push-l1">
                    <div class="btn" style="background: #DE2007;">
                      <span>Examinar</span>
                      <input type="file" id="imagen" name="imagen">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" file">
                    </div>
                  </div>
                </div>
                <div class="input-field col l3 pull-l1 right">
                    <a type="submit" id="botonEstadoAnterior" class="btn center z-depth-0" style="margin-top: 20px; background-color:white; border:1px solid #DE2007; color:black;">Anterior</a>
                    <button type="submit" id="botonSiguienteAnterior" class="btn right z-depth-0" style="margin-top: 20px; background-color:#DE2007; color:white; font-weight: bold;">Enviar</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>

    document.getElementById("botonSiguienteEstado").addEventListener("click", mostrarEstado2);
    document.getElementById("botonEstadoAnterior").addEventListener("click", mostrarEstado1);

    function mostrarEstado2() {
        document.getElementById("estado1").className = "animated bounceOutLeft";
        setTimeout(function(){ 
            document.getElementById("estado1").style.display = "none"; 
            document.getElementById("estado2").style.display = "block";
            document.getElementById("estado2").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos col m2 col l2 offset-m1";
            document.getElementById("elDiv2").className = "paso obra active col m4 col l4 push-l3";
        }, 1);

    }
    
    function mostrarEstado1() {
        document.getElementById("estado2").className = "animated bounceOutLeft";
        
        setTimeout(function(){ 
            document.getElementById("estado2").style.display = "none"; 
            document.getElementById("estado1").style.display = "block";
            document.getElementById("estado1").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos active col m2 col l2 offset-m1";
            document.getElementById("elDiv2").className = "paso obra col l2 col m4 col l4 push-l3";
        }, 1);
    }
    
    function animacion(id, clase) {
        $(id).removeClass("animated "+clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $(this).removeClass("animated "+clase);
        });
    };

</script>



@include('page.template.footer')
</body>
</html>
<script type="text/javascript" src="{{ asset('js/jquery/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/materialize/materialize.min.js') }}"></script>

<script type="text/javascript">
 $(document).ready(function(){
  $('.dropdown-trigger').dropdown({
    constrainWidth: false,
    closeOnClick: false,
    fullWidth: false,
    hover: 1,
  });
   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
