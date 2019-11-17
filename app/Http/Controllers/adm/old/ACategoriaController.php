<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\ACategoria;

class ACategoriaController extends Controller
{
    //
    public function createACategoria()
    {
        $usuario = Auth::user();
        $acategorias_seccion = 'active';
        $acategorias_create = 'active';

        return view('adm.acategorias.crearACategoria', compact('usuario','acategorias_seccion','acategorias_create'));
    }

    public function storeACategoria($request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'textil_categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        ACategoria::create($datos);
        $success = 'ACategoria creado correctamente';
        return back()->with('success', $success);
    }

    public function showACategoria()
    {                
        $usuario = Auth::user();
        $acategorias = ACategoria::all();
        $acategorias_seccion = 'active';
        $acategorias_edit = 'active';
        $acategorias = ACategoria::paginate(8);

        return view('adm.acategorias.editarACategorias', compact('usuario', 'acategorias','acategorias_seccion','acategorias_edit'));
    }

    public function editACategoria($id)
    {
        $acategoria = ACategoria::find($id);
        $usuario = Auth::user();
        $acategorias_seccion = 'active';
        $acategorias_edit = 'active';

        return view('adm.acategorias.editarACategoria', compact('acategoria','usuario','acategorias_seccion','acategorias_edit'));
    }

    public function updateACategoria($request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'textil_categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        $acategoria = ACategoria::find($id);
        $acategoria->fill($datos);
        $acategoria->save();
        $success = 'ACategoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyACategoria($id)
    {
        $acategoria = ACategoria::find($id);
        $acategoria->delete();
        $success = 'ACategoria eliminado correctamente';
        return back()->with('success', $success);
    }
}
