<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;

use Illuminate\Html;
use App\CategoriaCompresor;

class CategoriaCompresorController extends Controller
{
    //
    public function createCategoria()
    {
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_create = 'active';

        return view('adm.categoriacompresor.crearCategoriaCompresor', compact('usuario','categorias_seccion','categorias_create'));
    }

    public function storeCategoria(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categoriacompresor');
        $file_save ? $datos['imagen'] = $file_save : false;

        CategoriaCompresor::create($datos);
        $success = 'Categoria creado correctamente';
        return back()->with('success', $success);
    }

    public function showCategoria()
    {                
        $usuario = Auth::user();
        $categorias = CategoriaCompresor::all();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';
        $categorias = CategoriaCompresor::paginate(8);

        return view('adm.categoriacompresor.editarCategoriaCompresors', compact('usuario', 'categorias','categorias_seccion','categorias_edit'));
    }

    public function editCategoria($id)
    {
        $categoria = CategoriaCompresor::find($id);
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';

        return view('adm.categoriacompresor.editarCategoriaCompresor', compact('categoria','usuario','categorias_seccion','categorias_edit'));
    }

    public function updateCategoria(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categoriacompresor');
        $file_save ? $datos['imagen'] = $file_save : false;

        $categoria = CategoriaCompresor::find($id);
        $categoria->fill($datos);
        $categoria->save();
        $success = 'Categoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyCategoria($id)
    {
        $categoria = CategoriaCompresor::find($id);
        $categoria->delete();
        $success = 'Categoria eliminado correctamente';
        return back()->with('success', $success);
    }
}
