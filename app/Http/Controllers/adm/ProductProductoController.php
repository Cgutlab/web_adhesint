<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\ProductCategoria;
use App\ProductProducto;
use App\Presentacion;
use Illuminate\Html;
use App\Marca;

class ProductProductoController extends Controller
{
  public $section;

  public function __construct(){
    $section = 'productos';
    $usuario = Auth::user();
  }

  public function create($id)
  {
      $seccion = $this->section;
      $marcas = Marca::orderBy('orden', 'ASC')->pluck('titulo', 'id')->all();
      $categoria = ProductCategoria::find($id);
      $presentaciones = Presentacion::orderBy('orden', 'ASC')->get();
      return view('adm.productos_productos.create',  compact('seccion', 'categoria', 'marcas', 'presentaciones'));
  }

  public function store(Request $request)
  {
      $datos = $request->all();

      $file_save = Helpers::saveImage($request->file('imagen'), 'gallery_productos');
      $file_save ? $datos['imagen'] = $file_save : false;

      $file_save = Helpers::saveImage($request->file('ficha'), 'gallery_productos');
      $file_save ? $datos['ficha'] = $file_save : false;

      $producto = ProductProducto::create($datos);
      $producto->marcas()->sync($request->get('marcas'));
      $producto->presentaciones()->sync($request->get('presentaciones'));

      $success = 'Registrado creado correctamente';

      return back()->with('success', $success);
  }

  public function index()
  {
      $productos = ProductProducto::orderBy('orden')->paginate(8);
      $seccion = $this->section;
      return view('adm.productos_productos.index', compact('productos'));
  }

  public function lists($id)
  {
      $categoria = ProductCategoria::find($id);
      $productos = ProductProducto::where('id_categoria', $id)->orderBy('orden')->paginate(8);
      $id = $id;
      $seccion = $this->section;
      return view('adm.productos_productos.index', compact('productos', 'id', 'categoria'));
  }

  public function edit($id)
  {
      $marcas = Marca::orderBy('orden', 'ASC')->pluck('titulo', 'id')->all();
      $presentaciones = Presentacion::orderBy('orden', 'ASC')->pluck('titulo', 'id')->all();
      $producto = ProductProducto::find($id);
      return view('adm.productos_productos.edit', compact('producto','marcas','presentaciones'));
  }

  public function update(Request $request, $id)
  {
      $datos = $request->all();

      $file_save = Helpers::saveImage($request->file('imagen'), 'gallery_productos');
      $file_save ? $datos['imagen'] = $file_save : false;

      $file_save = Helpers::saveImage($request->file('ficha'), 'gallery_productos');
      $file_save ? $datos['ficha'] = $file_save : false;

      $producto = ProductProducto::find($id);
      $producto->fill($datos);
      $producto->save();
      $producto->marcas()->sync($request->get('marcas'));
      $producto->presentaciones()->sync($request->get('presentaciones'));

      $success = 'Registro editado correctamente';
      return back()->with('success', $success);
  }

  public function destroy($id)
  {
      $banner = ProductProducto::find($id);
      $banner->delete();
      $success = 'Registro eliminado correctamente';
      return back()->with('success', $success);
  }
}
