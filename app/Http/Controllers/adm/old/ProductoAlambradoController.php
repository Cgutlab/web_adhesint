<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\ProductoAlambrado;
use App\ListaDeProductos;


class ProductoAlambradoController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $productoalambrados_seccion = 'active';
        $productoalambrados_create = 'active';
        $listadeproductos = ListaDeProductos::all();

        return view('adm.productoalambrado.crearProductoAlambrado', compact('listadeproductos','usuario','productoalambrados_seccion','productoalambrados_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productoalambrados');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productoalambrados');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productoalambrados');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productoalambrados');
        $file_save ? $datos['ficha'] = $file_save : false;

        ProductoAlambrado::create($datos);
        $success = 'Producto creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $productoalambrados = ProductoAlambrado::all();
        $productoalambrados_seccion = 'active';
        $productoalambrados_edit = 'active';
        $productoalambrados = ProductoAlambrado::paginate(8);
       
        return view('adm.productoalambrado.editarProductoAlambrados', compact('usuario', 'productoalambrados','productoalambrados_seccion','productoalambrados_edit'));
    }

    public function lists($id)
    {   
        $productoalambrados = ProductoAlambrado::where('seccion', $id)->paginate(8);
        $usuario = Auth::user();
        $productoalambrados_seccion = 'active';
        $productoalambrados_edit = 'active';
            /*no hay categorias*/
        return view('adm.productoalambrado.editarProductoAlambrados', compact('usuario', 'productoalambrados','productoalambrados_seccion','productoalambrados_edit'));
    }

    public function edit($id)
    {
        $productoalambrado = ProductoAlambrado::find($id);
        $usuario = Auth::user();
        $productoalambrados_seccion = 'active';
        $productoalambrados_edit = 'active';

        $listadeproductos = ListaDeProductos::all();     

        return view('adm.productoalambrado.editarProductoAlambrado', compact('listadeproductos','productoalambrado','usuario','productoalambrados_seccion','productoalambrados_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'productoalambrados');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'productoalambrados');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'productoalambrados');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'productoalambrados');
        $file_save ? $datos['ficha'] = $file_save : false;

        $productoalambrado = ProductoAlambrado::find($id);
        $productoalambrado->fill($datos);
        $productoalambrado->save();
        $success = 'Producto editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $productoalambrado = ProductoAlambrado::find($id);
        $productoalambrado->delete();
        $success = 'Producto eliminado correctamente';
        return back()->with('success', $success);
    }
}
