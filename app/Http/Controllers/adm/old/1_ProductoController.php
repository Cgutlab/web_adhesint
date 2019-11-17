<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Producto;
use App\Categoria;

class ProductoController extends Controller
{
    public function createProducto()
    {
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_create = 'active';

        $categorias = Categoria::all();

        return view('adm.productos.crearProducto', compact('categorias','usuario','productos_seccion','productos_create'));
    }

    public function storeProducto(Request $request)
    {
        $producto = new Producto();
        $id = Producto::all()->max('id');
        $id++;

        $producto->titulo       = $request->titulo;


        $producto->texto1       = $request->texto1;
        $producto->orden        = $request->orden;
        $producto->id_category        = $request->id_category;


          if ($request->hasFile('imagen')){
              if ($request->file('imagen')->isValid()){
                  $file = $request->file('imagen');
                  $path = public_path('imagenes/productos/');
                  $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->imagen = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('imagen1')){
              if ($request->file('imagen1')->isValid()){
                  $file = $request->file('imagen1');
                  $path = public_path('imagenes/productos/');
                  $request->file('imagen1')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->imagen1 = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('imagen2')){
              if ($request->file('imagen2')->isValid()){
                  $file = $request->file('imagen2');
                  $path = public_path('imagenes/productos/');
                  $request->file('imagen2')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->imagen2 = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('pdf')){
              if ($request->file('pdf')->isValid()){
                  $file = $request->file('pdf');
                  $path = public_path('imagenes/productos/pdf/');
                  $request->file('pdf')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->pdf = '' . $id.'_'.$file->getClientOriginalName();
              }
          }

        $producto->save();
        $success = 'Producto creada correctamente';
        return back()->with('success', $success);
    }

    public function showProducto()
    {
        $usuario = Auth::user();
        $productos = Producto::all();
        $productos_seccion = 'active';
        $productos_edit = 'active';
        $productos = Producto::paginate(8);

        return view('adm.productos.editarProductos', compact('usuario', 'productos','productos_seccion','productos_edit'));
    }
    public function editProducto($id)
    {
        $producto = Producto::find($id);
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_edit = 'active';

        $categorias = Categoria::all();

        return view('adm.productos.editarProducto', compact('categorias','categoryas','producto','usuario','productos_seccion','productos_edit'));
    }

    public function updateProducto(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->titulo       = $request->titulo;


        $producto->texto1       = $request->texto1;
        $producto->orden        = $request->orden;
        $producto->id_category        = $request->id_category;

          if ($request->hasFile('imagen')){
              if ($request->file('imagen')->isValid()){
                  $file = $request->file('imagen');
                  $path = public_path('imagenes/productos/');
                  $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->imagen = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('imagen1')){
              if ($request->file('imagen1')->isValid()){
                  $file = $request->file('imagen1');
                  $path = public_path('imagenes/productos/');
                  $request->file('imagen1')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->imagen1 = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('imagen2')){
              if ($request->file('imagen2')->isValid()){
                  $file = $request->file('imagen2');
                  $path = public_path('imagenes/productos/');
                  $request->file('imagen2')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->imagen2 = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('pdf')){
              if ($request->file('pdf')->isValid()){
                  $file = $request->file('pdf');
                  $path = public_path('imagenes/productos/pdf/');
                  $request->file('pdf')->move($path, $id.'_'.$file->getClientOriginalName());
                  $producto->pdf = '' . $id.'_'.$file->getClientOriginalName();
              }
          }

        $producto->save();
        $success = 'Producto editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyProducto($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        $success = 'Producto eliminado correctamente';
        return back()->with('success', $success);
    }
}
