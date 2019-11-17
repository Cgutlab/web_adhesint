<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\CategoriaLuminaria;

class CategoriaLuminariaController extends Controller
{
    //
    public function createCategoria()
    {
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_create = 'active';
        
        return view('adm.categorialuminaria.crearCategoriaLuminaria', compact('usuario','categorias_seccion','categorias_create', 'seccion'));
    }

    public function storeCategoria(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorialuminaria');
        $file_save ? $datos['imagen'] = $file_save : false;

        CategoriaLuminaria::create($datos);
        $success = 'Categoria creado correctamente';
        return back()->with('success', $success);
    }

    public function showCategoria()
    {                
        $usuario = Auth::user();
        $categorias = CategoriaLuminaria::all();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';
        $categorias = CategoriaLuminaria::paginate(8);

        return view('adm.categorialuminaria.editarCategoriaLuminarias', compact('usuario', 'categorias','categorias_seccion','categorias_edit'));
    }

    public function editCategoria($id)
    {
        $categoria = CategoriaLuminaria::find($id);
        $usuario = Auth::user();
        $categorias_seccion = 'active';
        $categorias_edit = 'active';

        return view('adm.categorialuminaria.editarCategoriaLuminaria', compact('categoria','usuario','categorias_seccion','categorias_edit'));
    }



    public function update(Request $request, $id)
    {
        $dato = Dato::find($id);
        $dato->fill($request->all());
        $dato->save();
        $success = 'Dato editado correctamente';
        return Redirect::to('adm/datos')->with('success', $success);
    }



    public function updateCategoria(Request $request, $id)
    {
        $categoria = CategoriaLuminaria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        $success = 'Dato editado correctamente';

        $success = 'Categoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyCategoria($id)
    {
        $categoria = CategoriaLuminaria::find($id);
        $categoria->delete();
        $success = 'Categoria eliminado correctamente';
        return back()->with('success', $success);
    }
}
