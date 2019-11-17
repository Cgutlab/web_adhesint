<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\ModeloContenido;
use App\ModeloGaleria;

class ModeloContenidoController extends Controller
{
    //
    public function createCategoria()
    {
        $usuario = Auth::user();
        $modelos_seccion = 'active';
        $modelos_create = 'active';
        
        return view('adm.modelocontenido.crearModeloContenido', compact('usuario','modelos_seccion','modelos_create', 'seccion'));
    }

    public function storeCategoria(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'modelocontenido');
        $file_save ? $datos['imagen'] = $file_save : false;

        ModeloContenido::create($datos);
        $success = 'Categoria creado correctamente';
        return back()->with('success', $success);
    }

    public function showCategoria()
    {                
        $usuario = Auth::user();

        $modelos = ModeloContenido::all();
        $modelos_seccion = 'active';
        $modelos_edit = 'active';
        $modelos = ModeloContenido::paginate(15);

        return view('adm.modelocontenido.editarModeloContenidos', compact('usuario', 'modelos','modelos_seccion','modelos_edit', 'modelos_gals'));
    }

    public function editCategoria($id)
    {
        $modelo = ModeloContenido::find($id);        
        $usuario = Auth::user();
        $modelos_seccion = 'active';
        $modelos_edit = 'active';

        return view('adm.modelocontenido.editarModeloContenido', compact('modelo','usuario','modelos_seccion','modelos_edit'));
    }

    public function updateCategoria(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'modelocontenido');
        $file_save ? $datos['imagen'] = $file_save : false;

        $modelo = ModeloContenido::find($id);
        $modelo->fill($datos);
        $modelo->save();
        $success = 'Categoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyCategoria($id)
    {
        $modelo = ModeloContenido::find($id);
        $modelo->delete();
        $success = 'Categoria eliminado correctamente';
        return back()->with('success', $success);
    }
}
