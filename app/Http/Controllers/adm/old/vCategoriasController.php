<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\vCategoria;

class vCategoriasController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_create = 'active';

        return view('adm.vgalerias.crearCategoria', compact('usuario','categorias_seccion','categorias_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        vCategoria::create($datos);
        $success = 'Categoria creada correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $usuario = Auth::user();
        $categorias = vCategoria::all();

        return view('adm.vgalerias.editarCategorias', compact('usuario', 'categorias','categorias_seccion','categorias_edit'));
    }

    public function edit($id)
    {
        $categoria = vCategoria::find($id);
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';

        return view('adm.vgalerias.editarCategoria', compact('categoria','usuario','categorias_seccion','categorias_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        $categoria = vCategoria::find($id);
        $categoria->fill($datos);
        $categoria->save();
        $success = 'Categoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $categoria = vCategoria::find($id);
        $categoria->delete();
        $success = 'Categoria eliminado correctamente';
        return back()->with('success', $success);
    }
}
