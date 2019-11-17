<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\AplicacionCategoria;
use App\AplicacionProducto;
use App\ProductProducto;
use App\Presentacion;
use Illuminate\Html;
use App\Marca;

class AplicacionProductoController extends Controller
{
  public $section;

  public function __construct(){
    $section = 'productos';
    $usuario = Auth::user();
  }

  public function create($id)
  {
      $seccion = $this->section;
      $relacionados = ProductProducto::orderBy('orden', 'ASC')->pluck('titulo', 'id')->all();
      $categoria = AplicacionCategoria::find($id);
      return view('adm.aplicaciones_productos.create',  compact('seccion', 'categoria', 'relacionados'));
  }

  public function store(Request $request)
  {
      $datos = $request->all();

      $file_save = Helpers::saveImage($request->file('imagen'), 'gallery_aplicacion');
      $file_save ? $datos['imagen'] = $file_save : false;

      $file_save = Helpers::saveImage($request->file('ficha'), 'gallery_aplicacion');
      $file_save ? $datos['ficha'] = $file_save : false;
      
      $producto = AplicacionProducto::create($datos);
      $producto->relacionados()->sync($request->get('relacionados'));

      $success = 'Registrado creado correctamente';

      return back()->with('success', $success);
  }

  public function index()
  {
      $productos = AplicacionProducto::orderBy('orden')->paginate(8);
      $seccion = $this->section;
      return view('adm.aplicaciones_productos.index', compact('productos'));
  }

  public function lists($id)
  {
      $categoria = AplicacionCategoria::find($id);
      $productos = AplicacionProducto::where('id_categoria', $id)->orderBy('orden')->paginate(8);
      $id = $id;
      $seccion = $this->section;
      return view('adm.aplicaciones_productos.index', compact('productos', 'id', 'categoria'));
  }

  public function edit($id)
  {
      $marcas = Marca::orderBy('orden', 'ASC')->pluck('titulo', 'id')->all();
      $relacionados = ProductProducto::orderBy('orden', 'ASC')->pluck('titulo', 'id')->all();
      $producto = AplicacionProducto::find($id);
      return view('adm.aplicaciones_productos.edit', compact('producto','marcas','relacionados'));
  }

  public function update(Request $request, $id)
  {
      $datos = $request->all();

      $file_save = Helpers::saveImage($request->file('imagen'), 'gallery_aplicacion');
      $file_save ? $datos['imagen'] = $file_save : false;

      $file_save = Helpers::saveImage($request->file('ficha'), 'gallery_aplicacion');
      $file_save ? $datos['ficha'] = $file_save : false;

      $producto = AplicacionProducto::find($id);
      $producto->fill($datos);
      $producto->save();
      $producto->relacionados()->sync($request->get('relacionados'));

      $success = 'Registro editado correctamente';
      return back()->with('success', $success);
  }

  public function destroy($id)
  {
      $banner = AplicacionProducto::find($id);
      $banner->delete();
      $success = 'Registro eliminado correctamente';
      return back()->with('success', $success);
  }
}
