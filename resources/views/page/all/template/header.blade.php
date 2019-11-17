
{{-- 
<div class="hide-on-med-and-down Lato" style="width: 100%; background: #F3F3F3;">
  <div class="container cero Lato" style="width: 84%;" align="right">   

      @foreach($redes as $rede)
        <a href="{{($rede->ruta)}}">
          <img class="responsive-img iconos" src="{{asset('imagenes/redes/'.$rede->imagen)}}">
        </a>
        <span class="Lato rojiz1 fs16 fw6" style="vertical-align: middle;margin-right: 20px;">{{$rede->nombre}}</span>
      @endforeach
 
      <div class="btn z-depth-0" style="background-color: #545456; border-right: 1px solid #777777; border-radius: inherit; padding: 5px 10px 10px 10px; margin-left: -1px;margin-right: -1px;"><img src="{{asset('imagenes/help/buscador.png')}}"></div>   
<style type="text/css">
  .navbarActive{
    background: #DE2007!important;
  }
</style>
      <a href="{{route('presupuesto')}}"><div class="btn z-depth-0 fw3 @if($active == 'presupuesto') navbarActive @endif" style="background-color: #545456; border-right: 1px solid #777777; border-radius: inherit; padding: 2px 10px 5px 10px; margin-left: -2px;margin-right: -1px; letter-spacing: 0px;">SOLICITUD DE PRESUPUESTO</div></a>
      <a href="{{route('novedades')}}"><div class="btn z-depth-0 fw3 @if($active == 'novedades') navbarActive @endif" style="background-color: #545456; border-right: 1px solid #777777; border-radius: inherit; padding: 2px 10px 5px 10px; margin-left: -2px;margin-right: -1px; letter-spacing: 0px;">NOVEDADES</div>
      <a href="{{route('contacto')}}"><div class="btn z-depth-0 fw3 @if($active == 'contacto') navbarActive @endif" style="background-color: #545456; border-right: 1px solid #777777; border-radius: inherit; padding: 2px 10px 5px 10px; margin-left: -2px;margin-right: -1px; letter-spacing: 0px;"><img src="{{asset('imagenes/help/correoh.png')}}" style="margin-right:5px;">CONTACTO</div>   
  </div>
</div>
 --}}
<nav class="header z-depth-0" style="height: 142px; padding: 0; font-family: 'Raleway'">
<div class="nav-wrapper Raleway gris11" style="border-bottom: 1px solid #DDDDDD; padding: 0;">
<div class="container" style="width: 80%;">
  <div class="row">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger right" style="margin: 40px 0 50px 0px; padding: 0 10px 0 10px; border: 1px solid #DDDDDD"><i class="material-icons">menu</i></a>
  <div class="col l4 cero">
    <div class="row">
      <a href="{{route('index')}}">
        <img class="left responsive-img hide-on-small-only" style="max-height: 109px; margin: 1px; margin-top:12px" src="{{asset('imagenes/logos/'.$header->imagen)}}">
        <img class="hide-on-med-and-up show-on-small" style="position: absolute; max-height: 109px; margin-top:12px" src="{{asset('imagenes/logos/'.$header->imagen)}}">
      </a>
    </div>  
  </div>
  <div class="col l8 hide-on-med-and-down" style="line-height:20px;">
    <div class="row fw5" style="margin-top: 40px;">
      <div class="col l4 cero" style="padding: 0; margin: 0;">       
        <div class="row cero noFooterIcon">
          <div class="col l2 cero noFooterIcon s2" style="padding-top: 3px;" align="right">
            <img class="responsive-img" src="{{asset('imagenes/help/hmail.png')}}">
          </div>
          <div class="col l10 cero fw5 gris10 editorRico fs15 Raleway" style="margin-bottom: 0;">
            {!!$correo->texto!!}
          </div>
        </div>
        <div class="row cero noFooterIcon">
          <div class="col l2 cero noFooterIcon s2" style="padding-top: 10px;" align="right">
            <img class="responsive-img" src="{{asset('imagenes/help/haddress.png')}}">
          </div>
          <div class="col l10 cero fw5 gris10 editorRico fs15 Raleway" style="margin-bottom: 0;">
            {!!$direccion->texto!!}
          </div>
         </div>
      </div>
      <div class="col l4" style="padding: 0; margin: 0;">       
        <div class="row cero noFooterIcon">
          <div class="col l2 cero noFooterIcon s2" style="padding-top: 3px;" align="right">
            <img class="responsive-img" src="{{asset('imagenes/help/hphone.png')}}">
          </div>
          <div class="col l10 cero fw5 gris10 editorRico fs15 Raleway" style="margin-bottom: 0;">
            {!!$telefono->texto!!}
          </div>
        </div>
      </div>
      <div class="col l4">       
        <div class="row cero noFooterIcon">
          <div class="col l2 cero noFooterIcon s2" style="padding-top: 0px;">
          <a href="{{route('presupuesto')}}">
            <div class="center-align" style="background-color: #D31B22; color:white; padding: 12px; width: 270px; border-radius: 4px;">              
              <div class="center-align fw7 fs18">SOLICITAR PRESUPUESTO</div>
              <div class="center-align fw4 fs16">GRATIS Y SIN COMPROMISO</div>             
            </div>
          </a>
          </div>
        </div>
      </div>
      
    </div>
   </div>
{{--   <div class="col l1 hide-on-med-and-down" style="margin-top: 39px;">
    <a href="{{route('cliente')}}" style="color: inherit;">
    @if($active == 'cliente')
    <span class="lheader_active center fw6">CLIENTES</span>
    @else
    <span class="lheader center fw6">CLIENTES</span>
    @endif
    </a>
  </div> --}}
</div>
</div>
</div>
</nav>

<style type="text/css">
  div{
    background: rgba(25,25,25,0.);
  }
</style>

<nav class="fondo1 Raleway fs16 fw5 z-depth-0 hide-on-med-and-down">
<div class="container cero" style="width: 90%;">  
    {{-- <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a> --}}
    <div class="nav-wrapper">
      <ul class="hide-on-med-and-down">
        <li class="@if($active == 'empresa') active @endif"><a href="{{route('empresax')}}">EMPRESA</a></li>
        <li class="@if($active == 'productos/1') active @endif"><a href="{{url('productos/1')}}">ALAMBRADOS</a></li>
        <li class="@if($active == 'productos/2') active @endif"><a href="{{url('productos/2')}}">PUERTAS Y PORTONES</a></li>
        <li class="@if($active == 'productos/3') active @endif"><a href="{{url('productos/3')}}">POSTES</a></li>
        <li class="@if($active == 'productos/4') active @endif"><a href="{{url('productos/4')}}">OTROS PRODUCTOS</a></li>
        <li class="@if($active == 'servicios') active @endif"><a href="{{route('servicios')}}">SERVICIOS</a></li>
        <li class="@if($active == 'trabajosrealizados') active @endif"><a href="{{route('trabajosrealizados')}}">TRABAJOS REALIZADOS</a></li>
        <li class="@if($active == 'contacto') active @endif"><a href="{{route('contacto')}}">CONTACTO</a></li>
      </ul>    
      <a href="#!"><img src="{{asset('imagenes/help/lupita.png')}}" style="margin-top: 20px;"></a>
    </div>
</div>
</nav>

{{-- <div class="row">
  <div class="col l7" style="margin: 0; padding: 0;">
    <div class="row cero" style="margin: 0; padding: 0;">
      <div class="col l2" style="margin: 0; padding: 0;">
        <div class="blanco fw6 fs16 cero Raleway" style="padding: 20px 0;">EMPRESA</div>
      </div>
      <div class="col l3" style="margin: 0; padding: 0;">
        <div class="blanco fw6 fs16 cero Raleway" style="padding: 20px 0;">ALAMBRADOS</div>        
      </div>
      <div class="col l4" style="margin: 0; padding: 0;">
        <div class="blanco fw6 fs16 cero Raleway" style="padding: 20px 0;">PUERTAS Y PORTONES</div>
      </div>
      <div class="col l2" style="margin: 0; padding: 0;">
        <div class="blanco fw6 fs16 cero Raleway" style="padding: 20px 0;">POSTES</div>
      </div>
    </div> 
  </div>
  <div class="col l5" style="margin: 0; padding: 0;">
    <div class="row cero" style="margin: 0; padding: 0;">
      <div class="col l5" style="margin: 0; padding: 0;">
        <div class="blanco fw6 fs16 cero Raleway" style="padding: 20px 0;">OTROS PRODUCTOS</div>
      </div>
      <div class="col l1" style="margin: 0; padding: 0;">
        <div class="blanco fw6 fs16 cero Raleway" style="padding: 20px 0;">EMPRESA</div>
      </div>
    </div> 
  </div>
</div> --}}
</div>
</div>

<style type="text/css">
  .header a:hover {
    background-color: inherit;
  }
</style>
{{-- 
  <!-- Dropdown Trigger -->
  <a class='dropdown-trigger ' href='#' data-target='dropdown1'></a>

  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content' style="background-color: #333333;">
    <li>
      <a href="{{url('modelos/3')}}" class="Lato" style="color: white; @if($active == 'modelos/3') color: red; @endif">
      INDOMATRIX ENERGÍA
      </a>
    </li>
  </ul>
 --}}

<div>
  <ul class="sidenav" id="mobile-demo">
    <li>
      <a href="{{route('index')}}">
        @if($active == 'home')
        <b>HOME</b>
        @else
        HOME
        @endif
      </a>
    </li>
    <li>
      <a href="{{route('empresax')}}">
        @if($active == 'empresa')
        <b>EMPRESA</b>
        @else
        EMPRESA
        @endif
      </a>
    </li>
    <li>
      <a href="{{url('luminaria/4')}}">
        @if($active == 'luminaria/4')
        <b>PRODUCTOS LUMINARIAS</b>
        @else
        PRODUCTOS LUMINARIAS
        @endif
      </a>
    </li>
    <li>
      <a href="{{url('compresor/1')}}">
        @if($active == 'compresor/1')
        <b>PRODUCTOS COMPRESORES</b>
        @else
        PRODUCTOS COMPRESORES
        @endif
      </a>
    </li>    
    <li>
      <a href="{{url('modelos/1')}}">
        @if($active == 'modelos/1')
        <b>MODELOS PARA FUNDICION</b>
        @else
        MODELOS PARA FUNDICION
        @endif
      </a>
    </li>    
    <li>
      <a href="{{url('modelos/2')}}">
        @if($active == 'modelos/2')
        <b>MECANIZADO DE PIEZAS</b>
        @else
        MECANIZADO DE PIEZAS
        @endif
      </a>
    </li>   
    <li>
      <a href="{{url('modelos/3')}}">
        @if($active == 'modelos/3')
        <b>INDOMATRIX ENERGÍA</b>
        @else
        INDOMATRIX ENERGÍA
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/4')}}">
        @if($active == 'modelos/4')
        <b>CALIBRES DE CONTROL</b>
        @else
        CALIBRES DE CONTROL
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/5')}}">
        @if($active == 'modelos/5')
        <b>MECANIZADOS</b>
        @else
        MECANIZADOS
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/6')}}">
        @if($active == 'modelos/6')
        <b>MATRICERÍA</b>
        @else
        MATRICERÍA
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/7')}}">
        @if($active == 'modelos/7')
        <b>SERVICIOS DE FUNDICIÓN</b>
        @else
        SERVICIOS DE FUNDICIÓN
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/8')}}">
        @if($active == 'modelos/8')
        <b>EPOXIES / COMPOSITES</b>
        @else
        EPOXIES / COMPOSITES
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/9')}}">
        @if($active == 'modelos/9')
        <b>INGENIERÍA</b>
        @else
        INGENIERÍA
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/10')}}">
        @if($active == 'modelos/10')
        <b>DESARROLLO DE IDEAS</b>
        @else
        DESARROLLO DE IDEAS
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/11')}}">
        @if($active == 'modelos/11')
        <b>MÁQUINAS</b>
        @else
        MÁQUINAS
        @endif
      </a>
    </li> 
    <li>
      <a href="{{url('modelos/12')}}">
        @if($active == 'modelos/12')
        <b>COMPRESORES AIRDIN</b>
        @else
        COMPRESORES AIRDIN
        @endif
      </a>
    </li>  
    <li>
      <a href="{{url('modelos/13')}}">
        @if($active == 'modelos/13')
        <b>MINERÍA</b>
        @else
        MINERÍA
        @endif
      </a>
    </li> 
    <li>
      <a href="{{route('cliente')}}">
        @if($active == 'cliente')
        <b>CLIENTE</b>
        @else
        CLIENTE
        @endif
      </a>
    </li> 
    <li>
      <a href="{{route('presupuesto')}}">
        @if($active == 'presupuesto')
        <b>PRESUPUESTO</b>
        @else
        PRESUPUESTO
        @endif
      </a>
    </li> 
    <li>
      <a href="{{route('novedades')}}">
        @if($active == 'novedades')
        <b>NOVEDADES</b>
        @else
        NOVEDADES
        @endif
      </a>
    </li> 
    <li>
      <a href="{{route('contacto')}}">
        @if($active == 'contacto')
        <b>CONTACTO</b>
        @else
        CONTACTO
        @endif
      </a>
    </li> 
  </ul>
</div>
