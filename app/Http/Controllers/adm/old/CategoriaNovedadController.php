<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Html;
use App\CategoriaNovedad;

class CategoriaNovedadController extends Controller
{
    //
    public function createCategoria()
    {
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_create = 'active';

        return view('adm.categorianovedad.crearCategoriaNovedad', compact('usuario','categorias_seccion','categorias_create'));
    }

    public function storeCategoria(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorianovedad');
        $file_save ? $datos['imagen'] = $file_save : false;

        CategoriaNovedad::create($datos);
        $success = 'Categoria creado correctamente';
        return back()->with('success', $success);
    }

    public function showCategoria()
    {                
        $usuario = Auth::user();
        $categorias = CategoriaNovedad::all();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';
        $categorias = CategoriaNovedad::paginate(8);

        return view('adm.categorianovedad.editarCategoriaNovedads', compact('usuario', 'categorias','categorias_seccion','categorias_edit'));
    }

    public function editCategoria($id)
    {
        $usuario = Auth::user();
        $categoria = CategoriaNovedad::find($id);
        $categorias_seccion = 'active';
        $categorias_edit = 'active';

        return view('adm.categorianovedad.editarCategoriaNovedad', compact('categoria','usuario','categorias_seccion','categorias_edit'));
    }

    public function updateCategoria(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorianovedad');
        $file_save ? $datos['imagen'] = $file_save : false;

        $categoria = CategoriaNovedad::find($id);
        $categoria->fill($datos);
        $categoria->save();
        $success = 'Categoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyCategoria($id)
    {
        $categoria = CategoriaNovedad::find($id);
        $categoria->delete();
        $success = 'Categoria eliminado correctamente';
        return back()->with('success', $success);
    }
}
