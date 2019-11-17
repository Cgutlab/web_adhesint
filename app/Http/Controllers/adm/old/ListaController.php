<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\Lista;

class ListaController extends Controller
{
    //
    public function createLista()
    {
        $usuario = Auth::user();
        $listas_seccion = 'active';
        $listas_create = 'active';

        return view('adm.listas.crearLista', compact('usuario','listas_seccion','listas_create'));
    }

    public function storeLista(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'lista');
        $file_save ? $datos['imagen'] = $file_save : false;

        Lista::create($datos);
        $success = 'Lista creado correctamente';
        return back()->with('success', $success);
    }

    public function showLista()
    {                
        $usuario = Auth::user();
        $listas = Lista::all();
        $listas_seccion = 'active';
        $listas_edit = 'active';
        $listas = Lista::paginate(8);

        return view('adm.listas.editarListas', compact('usuario', 'listas','listas_seccion','listas_edit'));
    }

    public function editLista($id)
    {
        $lista = Lista::find($id);
        $usuario = Auth::user();
        $listas_seccion = 'active';
        $listas_edit = 'active';

        return view('adm.listas.editarLista', compact('lista','usuario','listas_seccion','listas_edit'));
    }

    public function updateLista(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'lista');
        $file_save ? $datos['imagen'] = $file_save : false;

        $lista = Lista::find($id);
        $lista->fill($datos);
        $lista->save();
        $success = 'Lista editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyLista($id)
    {
        $lista = Lista::find($id);
        $lista->delete();
        $success = 'Lista eliminado correctamente';
        return back()->with('success', $success);
    }
}
