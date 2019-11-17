<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Html;
use App\Categoria;

class CategoriaController extends Controller
{
    //
    public function createCategoria()
    {
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_create = 'active';

        return view('adm.categorias.crearCategoria', compact('usuario','categorias_seccion','categorias_create'));
    }

    public function storeCategoria(CategoriasRequest $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'textil_categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        Categoria::create($datos);
        $success = 'Categoria creado correctamente';
        return back()->with('success', $success);
    }

    public function showCategoria()
    {                
        $usuario = Auth::user();
        $categorias = Categoria::all();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';
        $categorias = Categoria::paginate(8);

        return view('adm.categorias.editarCategorias', compact('usuario', 'categorias','categorias_seccion','categorias_edit'));
    }

    public function editCategoria($id)
    {
        $categoria = Categoria::find($id);
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';

        return view('adm.categorias.editarCategoria', compact('categoria','usuario','categorias_seccion','categorias_edit'));
    }

    public function updateCategoria(CategoriasRequest $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'textil_categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        $categoria = Categoria::find($id);
        $categoria->fill($datos);
        $categoria->save();
        $success = 'Categoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyCategoria($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        $success = 'Categoria eliminado correctamente';
        return back()->with('success', $success);
    }
}
