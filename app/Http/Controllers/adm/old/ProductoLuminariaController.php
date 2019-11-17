<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductosRequest;
use Illuminate\Html;
use App\ProductoLuminaria;
use App\CategoriaLuminaria;

class ProductoLuminariaController extends Controller
{
    //
    public function createProducto()
    {
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_create = 'active';
        $categorias = CategoriaLuminaria::all();
        return view('adm.productoluminaria.crearProductoLuminaria', compact('usuario','productos_seccion','productos_create', 'categorias'));
    }

    public function storeProducto(ProductosRequest $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productoluminaria');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productoluminaria');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productoluminaria');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productoluminaria');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'productoluminaria');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'productoluminaria');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        ProductoLuminaria::create($datos);
        $success = 'Producto creado correctamente';
        return back()->with('success', $success);
    }

    public function showProducto()
    {                
        $usuario = Auth::user();
        $productos = ProductoLuminaria::all();
        $productos_seccion = 'active';
        $productos_edit = 'active';
        $productos = ProductoLuminaria::paginate(8);

        return view('adm.productoluminaria.editarProductoLuminarias', compact('usuario', 'productos','productos_seccion','productos_edit'));
    }

    public function listsProducto($id)
    {                   
        $productos = ProductoLuminaria::where('id_categorias_luminarias', $id)->paginate(8);
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_edit = 'active';

        return view('adm.productoluminaria.editarProductoLuminarias', compact('usuario', 'productos','productos_seccion','productos_edit'));
    }

    public function editProducto($id)
    {
        $producto = ProductoLuminaria::find($id);
        $usuario = Auth::user();
        $productos_seccion = 'active';
        $productos_edit = 'active';
        $categorias = CategoriaLuminaria::all();
        return view('adm.productoluminaria.editarProductoLuminaria', compact('producto','usuario','productos_seccion','productos_edit','categorias'));
    }

    public function updateProducto(ProductosRequest $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productoluminaria');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productoluminaria');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productoluminaria');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productoluminaria');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'productoluminaria');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'productoluminaria');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        $producto = ProductoLuminaria::find($id);
        $producto->fill($datos);
        $producto->save();
        $success = 'Producto editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyProducto($id)
    {
        $producto = ProductoLuminaria::find($id);
        $producto->delete();
        $success = 'Producto eliminado correctamente';
        return back()->with('success', $success);
    }
}
