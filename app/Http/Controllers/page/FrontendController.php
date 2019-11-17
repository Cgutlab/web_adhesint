<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destacado;
use App\Content;
use App\Slider;
use App\Red;
use App\Data;
use App\Banner;
use App\Metadata;
use App\Actividad;
use App\Video;
use App\iCabana;
use App\iGaleria;
use App\vCategoria;
use App\Marca;
use App\Gallery;
use App\ProductCategoria;
use App\AplicacionCategoria;
use App\AplicacionProducto;
use App\ProductProducto;

class FrontendController extends Controller
{

  public function home(){
    $active = 'home';
    $marcas      = Marca::orderBy('orden','asc')->where('visible_home', '1')->get();
    $metadato    = Metadata::where('seccion', $active)->first();
    $sliders     = Slider::where('seccion', $active)->orderBy('orden','asc')->get();
    $contenido   = Content::where('seccion', $active)->orderBy('orden','asc')->first();
    $c1   = Content::where('orden', 'AA')->first();
    $c2   = Content::where('orden', 'BB')->first();
    $c3   = Content::where('orden', 'CC')->first();
    $c4   = Content::where('orden', 'DD')->first();
    $banner   = Banner::where('seccion', $active)->first();
    $destacados  = ProductCategoria::where('visible_home', '1')->orderBy('orden','asc')->get();

    return view('page.home', compact('active', 'metadato', 'sliders', 'destacados', 'contenido', 'marcas', 'c1', 'c2', 'c3', 'c4', 'banner'));
  }

  public function inyeccionterceros(){
    $active = 'inyeccion-a-terceros';
    $banner = Banner::where('seccion', $active)->first();
    $metadato = Metadata::where('seccion', $active)->first();
    $contenido = Content::where('seccion', $active)->orderBy('orden', 'asc')->first();
    $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();

    return view('page.inyeccion-a-terceros', compact('contenido', 'metadato', 'active', 'sliders', 'banner'));
  }

  public function AplicacionSelect($id){
    $AppProductSelect = AplicacionProducto::where('id_categoria', $id)->get();
    return $AppProductSelect;
  }

  public function solicitarpresupuesto(){
    $active = 'presupuesto';
    $metadato = Metadata::where('seccion', $active)->first();
    $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
    return view('page.solicitar-presupuesto', compact('active', 'metadato', 'sliders'));
  }

  public function categorias(){
    $active = 'productos';
    $metadato = Metadata::where('seccion', $active)->first();
    $categorias = ProductCategoria::orderBy('orden', 'asc')->get();
    $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
    return view('page.categorias', compact('active', 'metadato', 'categorias', 'sliders'));
  }

  public function productos($id){
    $active = 'productos';
    $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
    $metadato = Metadata::where('seccion', $active)->first();
    $categorias = ProductCategoria::orderBy('orden', 'asc')->get();
    $productox  = ProductProducto::where('id_categoria', $id)->orderBy('orden', 'asc')->get();
    $productos  = ProductProducto::orderBy('orden', 'asc')->get();
    $item = ProductCategoria::find($id);
    return view('page.productos', compact('active', 'metadato', 'productox', 'productos', 'item', 'categorias', 'sliders'));
  }

  public function producto($id){
    $active = 'productos';
    $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
    $metadato = Metadata::where('seccion', $active)->first();
    $item = ProductProducto::where('id', $id)->first();
    $categorias = ProductCategoria::orderBy('orden', 'asc')->get();
    $productos = ProductProducto::orderBy('orden', 'asc')->get();
    $cont = 0;
    return view('page.producto', compact('active', 'metadato', 'productos', 'item', 'categorias', 'galerias', 'cont', 'sliders'));
  }


    public function cabanas()

    {

      $active = 'cabanas';

      $metadato = Metadata::where('seccion', $active)->first();

      $contenido = Content::where('seccion', $active)->first();

      $sliders   = Slider::orderBy('orden', 'asc')->where('seccion', $active)->get();



      $cabanas   = iCabana::orderBy('orden', 'asc')->get();



      return view('page.'.$active, compact('contenido', 'metadato', 'active', 'sliders', 'imagenes', 'cabanas'));

    }





    public function cabana($id)

    {

      $active = 'cabanas';

      $metadato = Metadata::where('seccion', $active)->first();

      $contenido = Content::where('seccion', $active)->first();

      $sliders   = Slider::orderBy('orden', 'asc')->where('seccion', $active)->get();



      $cabana     = iCabana::where('id', $id)->first();

      $imagenes   = iGaleria::orderBy('orden', 'asc')->where('id_cabana', $id)->get();



      return view('page.cabana', compact('contenido', 'metadato', 'active', 'sliders', 'imagenes', 'proyecto', 'cabana'));

    }





    public function servicios()

    {

      $active = 'servicios';

      $contenido    = Content::where('seccion', $active)->first();

      $actividades  = Actividad::orderBy('orden', 'asc')->get();

      $sliders      = Slider::orderBy('orden', 'asc')->where('seccion', $active)->get();

      $metadato     = Metadata::where('seccion', $active)->first();

      return view('page.'.$active, compact('contenido','actividades','metadato', 'active', 'sliders'));

    }





    public function videos()
    {
      $active = 'videos';
      $metadato   = Metadata::where('seccion', $active)->first();
      $contenido  = Content::where('seccion', $active)->first();
      $sliders    = Slider::orderBy('orden', 'asc')->where('seccion', $active)->get();
      $videos     = Video::orderBy('orden', 'asc')->get();

      return view('page.'.$active, compact('contenido', 'metadato', 'active', 'sliders', 'videos'));

    }





    public function galerias()
    {
      $active = 'galerias';
      $metadato   = Metadata::where('seccion', $active)->first();
      $contenido  = Content::where('seccion', $active)->first();
      $sliders    = Slider::orderBy('orden', 'asc')->where('seccion', $active)->get();
      $incrementa = '0';
      $categorias = vCategoria::orderBy('orden', 'asc')->get();
      $galeria = vGaleria::orderBy('orden', 'asc')->get();

      return view('page.'.$active, compact('contenido', 'metadato', 'active', 'sliders', 'categorias', 'incrementa', 'galeria'));
    }

    public function aplicaciones()
    {
      $active = 'aplicaciones';
      $metadato = Metadata::where('seccion', $active)->first();
      $contenido = Content::where('seccion', $active)->orderBy('orden', 'asc')->first();
      $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
      $categorias = AplicacionCategoria::orderBy('orden', 'asc')->get();
      $productos  = AplicacionProducto::orderBy('orden', 'asc')->get();

      return view('page.'.$active, compact('contenido', 'metadato', 'active', 'sliders', 'categorias', 'productos'));
    }

    public function aplicacion(Request $request)
    {
      if($request->producto){
          $aplicacion = AplicacionProducto::find($request->producto);
      }elseif($request->categoria){
          $metadato = Metadata::where('seccion', 'aplicaciones')->first();
          $contenido = Content::where('seccion', 'aplicaciones')->orderBy('orden', 'asc')->first();
          $sliders   = Slider::where('seccion', 'aplicaciones')->orderBy('orden', 'asc')->get();
          $categorias = AplicacionCategoria::orderBy('orden', 'asc')->get();
          $productos  = AplicacionProducto::where('id_categoria', $request->categoria)->orderBy('orden', 'asc')->get();
          $select = $request->categoria;
          return view('page.aplicaciones', compact('select','contenido', 'metadato', 'active', 'sliders', 'categorias', 'productos'));
      }else{
          return back();
      }
      $active = 'aplicaciones';
      $metadato = Metadata::where('seccion', $active)->first();
      $contenido = Content::where('seccion', $active)->orderBy('orden', 'asc')->first();
      $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
      $categorias = AplicacionCategoria::orderBy('orden', 'asc')->get();
      $productos  = AplicacionProducto::orderBy('orden', 'asc')->get();

      return view('page.aplicacion', compact('aplicacion','contenido', 'metadato', 'active', 'sliders', 'categorias', 'productos'));
    }

    public function empresa()
    {
      $active = 'empresa';
      $metadato = Metadata::where('seccion', $active)->first();
      $contenido = Content::where('seccion', $active)->orderBy('orden', 'asc')->first();
      $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();

      return view('page.'.$active, compact('contenido', 'metadato', 'active', 'sliders'));
    }


    public function buscador(){
      $active = 'buscador';
      $metadato = Metadata::where('seccion', $active)->first();
      $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
      return view('page.buscador', compact('metadato', 'active', 'sliders'));
    }

    public function buscando(Request $request){
      $active = 'buscador';
      $metadato = Metadata::where('seccion', $active)->first();
      $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
      if($request->busqueda){
        $resultados = 1;
      }else{
        $resultados = 0;
      }
      $busqueda = $request->busqueda;
      $productos = ProductProducto::where('titulo', 'like', '%' . $busqueda . '%')
                                ->orwhere('texto', 'like', '%' . $busqueda . '%')
                                ->orwhere('caption', 'like', '%' . $busqueda . '%')
                                ->get();
      $sliders   = Slider::where('seccion', $active)->orderBy('orden', 'asc')->get();
      return view('page.buscador', compact('productos', 'metadato', 'active', 'sliders', 'resultados', 'busqueda'));
    }

    public function contacto()

    {

      $active = 'contacto';

      $metadato = Metadata::where('seccion', $active)->first();

      $contenido = Content::where('seccion', 'condiciones')->first();

      return view('page.'.$active, compact('contenido', 'metadato', 'active', 'sliders'));

    }





    public function llenarformulario(Request $request)

    {

      $active = 'contacto';

      $metadato = Metadata::where('seccion', $active)->first();

      $contenido = Content::where('seccion', $active)->first();

      $sliders   = Slider::orderBy('orden', 'asc')->where('seccion', $active)->get();



      $desde = $request->input('desde');

      $hasta = $request->input('hasta');

      $cabanas = $request->input('cabanas');

      $pasajeros = $request->input('pasajeros');



      return view('page.contacto', compact('contenido', 'metadato', 'active', 'sliders', 'desde', 'hasta', 'cabanas', 'pasajeros'));

    }

}
