 <footer>
 <div class="container" style="width: 100%;">   
    <div class="row" style="margin-bottom: 0; padding: 15px 0;">
    	<div class="col l5 s12 hide-on-med-and-down center">
	   		<img src="{{asset('imagenes/logos/'.$footer->imagen)}}" style="max-height: 175px;">
	   		{{-- <img src="{{ asset('imagenes/logo/'.$dirrecion->imagen)}}">ASI SE LLAMAN LAS IMAGENES --}}
	   	</div>
	   	<div class="col l2 offset-l1 s12">
	       	<h5>SITEMAP</h5>
	           	<ul>
	           		<div class="row">
	           			<div class="col l3">
				           	<li><a href="{{route('index')}}">HOME</a></li>
				           	<li><a href="{{route('productos')}}">PRODUCTOS</a></li>
				          	<li><a href="{{route('novedades')}}">NOVEDADES</a></li>
				          	<li><a href="{{route('empresax')}}">EMPRESA</a></li>
				          	<li><a href="{{route('contacto')}}">CONTACTO</a></li>
				        </div>
{{--
		          		<div class="col l3 offset-l1">
				          	<li><a href="descarga">Certificados</a></li>
				        </div>
--}}
				    </div>
	           	</ul>
	    </div>	   	
		<div class="col l4 s12">
			
		        <h5 style="margin-bottom: 20px; margin-left: 31px;">AURITOR • RADISTOR</h5>
		        <div class="item-footer" style="margin-bottom: 10px;">
	                <i class="material-icons" style="margin-right:5px; display: inline-block; line-height: 1.5; ">place</i>
	                <div style="width:90%;float: right; margin-bottom: 1px; padding-right: 50px;">{{$direccion->texto}}</div>
	            </div>
	            <div class="item-footer" style="margin-bottom: 10px;">
	                <i class="material-icons" style="margin-right:5px; display: inline-block;">local_phone</i>
	                <div style="width:90%;float: right;">{{$telefono->texto}}</div>
	            </div>
	            <div class="item-footer">
	                <i class="material-icons" style="margin-right:5px; display: inline-block;">mail_outline</i>
	                <div style="width:90%;float: right;">{{$correo->texto}}</div>
	            </div>
	    </div>
	</div>
</div>
</footer>