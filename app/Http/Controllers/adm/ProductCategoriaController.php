<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\ProductCategoria;
use Illuminate\Html;

class ProductCategoriaController extends Controller
{
  public $section;

  public function __construct(){
    $section = 'productos';
    $usuario = Auth::user();
  }

  public function create()
  {
      $seccion = $this->section;
      return view('adm.productos_categorias.create',  compact('seccion'));
  }

  public function store(Request $request)
  {
      $datos = $request->all();

      $file_save = Helpers::saveImage($request->file('imagen'), 'gallery_productos');
      $file_save ? $datos['imagen'] = $file_save : false;

      ProductCategoria::create($datos);
      $success = 'Registrado creado correctamente';

      return back()->with('success', $success);
  }

  public function index()
  {
      $categorias = ProductCategoria::orderBy('orden')->paginate(8);
      $seccion = $this->section;
      return view('adm.productos_categorias.index', compact('categorias'));
  }

  public function edit($id)
  {
      $categoria = ProductCategoria::find($id);
      $usuario = Auth::user();
      $categorias_seccion = 'active';
      $categorias_edit = 'active';

      return view('adm.productos_categorias.edit', compact('productos', 'categoria','usuario','banners_seccion','banners_edit'));
  }

  public function update(Request $request, $id)
  {
      $datos = $request->all();

      isset($datos['visible_home']) ? $datos['visible_home'] = true : $datos['visible_home'] = false;

      $file_save = Helpers::saveImage($request->file('imagen'), 'gallery_productos');
      $file_save ? $datos['imagen'] = $file_save : false;

      $banner = ProductCategoria::find($id);
      $banner->fill($datos);
      $banner->save();
      $success = 'Registro editado correctamente';
      return back()->with('success', $success);
  }

  public function destroy($id)
  {
      $banner = ProductCategoria::find($id);
      $banner->delete();
      $success = 'Registro eliminado correctamente';
      return back()->with('success', $success);
  }
}
