<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Illuminate\Html;
use App\Gallery;
use App\Product;
use App\Category;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $active = 'productos';
    }

    public function create()
    {
        $categorias = Category::orderBy('orden')->get();
        return view('adm.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productos');
        $file_save ? $datos['imagen'] = $file_save : false;
        $file_save = Helpers::saveImage($request->file('imagen1'), 'productos');
        $file_save ? $datos['imagen1'] = $file_save : false;
        $file_save = Helpers::saveImage($request->file('imagen2'), 'productos');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('plano'), 'planos');
        $file_save ? $datos['plano'] = $file_save : false;

        Product::create($datos);
        $success = 'Registro creado correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $productos = Product::orderBy('orden','asc')->paginate(10);
        return view('adm.productos.index', compact('productos'));
    }

    public function edit($id)
    {
        $producto = Product::find($id);
        $categorias = Category::orderBy('orden')->get();
        return view('adm.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productos');
        $file_save ? $datos['imagen'] = $file_save : false;
        $file_save = Helpers::saveImage($request->file('imagen1'), 'productos');
        $file_save ? $datos['imagen1'] = $file_save : false;
        $file_save = Helpers::saveImage($request->file('imagen2'), 'productos');
        $file_save ? $datos['imagen2'] = $file_save : false;
        
        $file_save = Helpers::saveImage($request->file('plano'), 'planos');
        $file_save ? $datos['plano'] = $file_save : false;

        $producto = Product::find($id);
        $producto->fill($datos);
        $producto->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $producto = Product::find($id);
        $producto->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
