<div class="hide-on-med-and-down" style="width: 100%; background: #EBEBEB;">
<div class="container" width="100%">   
	<div class="container" style="width: 30%;  margin-left: 85%; max-height: 170px;">{{-- ESPACIO VACIO --}}
		<div class="row" style="margin: 0; background: #EBEBEB;">
			<a href="#">
				<div class="btn z-depth-0 left" style="background-color: #393186; border-radius: inherit; padding: 5px 10px 10px 10px;"><img src="{{asset('imagenes/help/header-search.png')}}"></div>
			</a>
      @if($active == 'listas' or $active == 'contactos')
			<a href="{{route('index')}}">      
      @else
      <a class="dropdown-trigger" data-target="dropdown1" href="#">
      @endif
			<div style="width: 300px;">
				<div class="col l6" style="border-right: 1px solid #B0B0B0;">
					<div style="line-height: 17px; font-family: 'Raleway'; font-size: 14px; font-weight: 500; color: #484848;" align="center">
          @if($active == 'listas' or $active == 'contactos')
          &nbsp;
          @else
          INICIAR SESI&OacuteN
          @endif
          </div>

				<div class="col l6" style="height: 1.2px; background-color: #322B7A; width: 100%;"></div>
					<div style="line-height: 17px; font-family: 'Raleway'; font-size: 14px; font-weight: 500; color: #393184;" align="center">
          
          @if($active == 'listas' or $active == 'contactos')
          DESCONECTAR
          @else
          &AacuteREA PRIVADA
          @endif
          </div>
				</div>
			</div>
			</a>
		</div>
	</div>
</div>
</div>
  <!-- Dropdown Trigger -->

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content' style="background: none;">
	<div class="container" style="background: #C1C1C1; margin-top: 74px !important; outline: none; width: 280px;">
{!!Form::open(['route'=>'cuenta.validarlogin', 'method'=>'POST'])!!}

	    <div class="input-field col s12" style="padding-left: 10px; margin: 2px; margin-top: 15px;">
	      {!!Form::text('email',null,['class'=>'validate', 'required', 'autocomplete' => 'off'])!!}
	      <label for="email" style="color:white; font-weight: 500; font-family: 'Raleway'; font-size: 15px;">Email</label>
	    </div>
	    <div class="input-field col s12" style="padding-left: 10px; margin: 2px;">
	      {!!Form::password('contrasena',null,['class'=>'validate', 'required'])!!}
	      <label for="contrasena" style="color:white; font-weight: 500; font-family: 'Raleway'; font-size: 15px;">Contraseña</label>
	    </div>
    	<div class="col s6">
    	<a href="{{route('cuenta_r')}}">
	      <li><span  style=" background-color: black;font-size: 12px; color: #4B4B4B; font-size: 14px; font-family: 'Raleway';">¿Has olvidado tu contraseña?</span></li>
	    </a>
	    </div>

	    <style type="text/css">
	    	.color-del-boton{
	    		 background-color: #01A0E2;
	    	}
	    	.color-del-boton:hover{
	    		 background-color: #01A0E2;
	    	}

	    </style>

	    <div class="col s6">
	    	{!!Form::submit('INGRESAR', ['class'=>'waves-effect waves-light btn right color-del-boton'])!!}
	    </div>
	    
      <li class="center" style="font-size: 12px; text-decoration: underline;">
      <a href="{{route('cuenta_c')}}">
      CREAR CUENTA
	    </a>
      </li>
      
{!!Form::close()!!} 
	   </div>
  </ul>



<nav class="header z-depth-0" style="background-color: white; border-top: 1px solid #B0B0B0;  height: 157px;">

    <div class="nav-wrapper" style="border-bottom: 1px solid #DDDDDD;">
		<div class="container" style="width: 100%; ">    	
    <a href="#" data-target="mobile-demo" class="sidenav-trigger" style="margin: 40px 0 50px 0px; padding: 0 0 0 10px;"><i class="material-icons">menu</i></a>
      	<ul id="nav-mobile" class="left hide-on-med-and-down">
	        <li style="margin: 10px 18px 20px 130px;">
            <a href="{{route('servicios')}}">
              @if($active == 'listas')
              <div style="font-size: 16px; font-weight: 700; color: #009FE1;">
              LISTA DE PRECIOS
              </div>
              @else
              <div style="font-size: 16px; font-weight: 500;">
              LISTA DE PRECIOS
              </div>
              @endif
            </a>
          </li>
	    </ul>
		
			<img class="brand-logo center" style="max-height: 155px; margin: 0px;" src="{{asset('imagenes/logos/'.$header->imagen)}}">
		
	    <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li style="margin: 10px 148px 20px 20px;">
            <a href="{{route('contactos')}}">
              @if($active == 'contactos')
              <div style="font-size: 16px; font-weight: 700; color: #009FE1;">
              CONTACTO
              </div>
              @else
              <div style="font-size: 16px; font-weight: 500;">
              CONTACTO
              </div>
              @endif
            </a>
          </li>
	    </ul>
	    </div>	   	     	
    </div>
</nav>
<div>
  <ul class="sidenav" id="mobile-demo">
    <li>
      <a href="{{route('servicios')}}">
        @if($active == 'listas')
        <b>LISTA DE PRECIOS</b>
        @else
        LISTA DE PRECIOS
        @endif
      </a>
    </li>
    <li>
      <a href="{{route('contactos')}}">
        @if($active == 'contactos')
        <b>CONTACTO</b>
        @else
        CONTACTO
        @endif
      </a>
    </li>
  </ul>
</div>