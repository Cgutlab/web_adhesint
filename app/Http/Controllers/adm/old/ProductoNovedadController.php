<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductosRequest;
use Illuminate\Html;
use App\ProductoNovedad;
use App\CategoriaNovedad;

class ProductoNovedadController extends Controller
{
    //
    public function createProducto()
    {
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_create = 'active';
        $categorias = CategoriaNovedad::all();
        return view('adm.productonovedad.crearProductoNovedad', compact('usuario','productos_seccion','productos_create', 'categorias'));
    }

    public function storeProducto(ProductosRequest $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productonovedad');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productonovedad');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productonovedad');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productonovedad');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'productonovedad');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'productonovedad');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        ProductoNovedad::create($datos);
        $success = 'Producto creado correctamente';
        return back()->with('success', $success);
    }

    public function showProducto()
    {                
        $usuario = Auth::user();
        $productos = ProductoNovedad::all();
        $productos_seccion = 'active';
        $productos_edit = 'active';
        $productos = ProductoNovedad::paginate(8);

        return view('adm.productonovedad.editarProductoNovedads', compact('usuario', 'productos','productos_seccion','productos_edit'));
    }

    public function listsProducto($id)
    {                   
        $productos = ProductoNovedad::where('id_categorias_novedads', $id)->paginate(15);
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_edit = 'active';

        return view('adm.productonovedad.editarProductoNovedads', compact('usuario', 'productos','productos_seccion','productos_edit'));
    }

    public function editProducto($id)
    {
        $producto = ProductoNovedad::find($id);
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_edit = 'active';
        $categorias = CategoriaNovedad::all();
        return view('adm.productonovedad.editarProductoNovedad', compact('producto','usuario','productos_seccion','productos_edit','categorias'));
    }

    public function updateProducto(ProductosRequest $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productonovedad');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productonovedad');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productonovedad');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productonovedad');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'productonovedad');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'productonovedad');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        $producto = ProductoNovedad::find($id);
        $producto->fill($datos);
        $producto->save();
        $success = 'Producto editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyProducto($id)
    {
        $producto = ProductoNovedad::find($id);
        $producto->delete();
        $success = 'Producto eliminado correctamente';
        return back()->with('success', $success);
    }
}
