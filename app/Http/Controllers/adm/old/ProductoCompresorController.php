<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductosRequest;
use Illuminate\Html;
use App\ProductoCompresor;
use App\CategoriaCompresor;

class ProductoCompresorController extends Controller
{
    //
    public function createProducto()
    {
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_create = 'active';
        $categorias = CategoriaCompresor::all();
        return view('adm.productocompresor.crearProductoCompresor', compact('usuario','productos_seccion','productos_create', 'categorias'));
    }

    public function storeProducto(ProductosRequest $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productocompresor');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productocompresor');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productocompresor');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productocompresor');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'productocompresor');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'productocompresor');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        ProductoCompresor::create($datos);
        $success = 'Producto creado correctamente';
        return back()->with('success', $success);
    }

    public function showProducto()
    {                
        $usuario = Auth::user();
        $productos = ProductoCompresor::all();
        $productos_seccion = 'active';
        $productos_edit = 'active';
        $productos = ProductoCompresor::paginate(8);

        return view('adm.productocompresor.editarProductoCompresors', compact('usuario', 'productos','productos_seccion','productos_edit'));
    }

    public function listsProducto($id)
    {                   
        $productos = ProductoCompresor::where('id_categorias_compresors', $id)->paginate(15);
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_edit = 'active';

        return view('adm.productocompresor.editarProductoCompresors', compact('usuario', 'productos','productos_seccion','productos_edit'));
    }

    public function editProducto($id)
    {
        $producto = ProductoCompresor::find($id);
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_edit = 'active';
        $categorias = CategoriaCompresor::all();
        return view('adm.productocompresor.editarProductoCompresor', compact('producto','usuario','productos_seccion','productos_edit','categorias'));
    }

    public function updateProducto(ProductosRequest $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productocompresor');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productocompresor');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productocompresor');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productocompresor');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'productocompresor');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'productocompresor');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        $producto = ProductoCompresor::find($id);
        $producto->fill($datos);
        $producto->save();
        $success = 'Producto editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyProducto($id)
    {
        $producto = ProductoCompresor::find($id);
        $producto->delete();
        $success = 'Producto eliminado correctamente';
        return back()->with('success', $success);
    }
}
