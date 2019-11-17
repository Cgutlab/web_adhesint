<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\Descarga;

class DescargaController extends Controller
{
    //
    public function createDescarga()
    {
        $usuario = Auth::user();
        $descargas_seccion = 'active';
        $descargas_create = 'active';

        return view('adm.descargas.crearDescarga', compact('usuario','descargas_seccion','descargas_create'));
    }

    public function storeDescarga(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'descargas');
        $file_save ? $datos['imagen'] = $file_save : false;

        Descarga::create($datos);
        $success = 'Descarga creado correctamente';
        return back()->with('success', $success);
    }

    public function showDescarga()
    {                
        $usuario = Auth::user();
        $descargas = Descarga::all();
        $descargas_seccion = 'active';
        $descargas_edit = 'active';
        $descargas = Descarga::paginate(8);

        return view('adm.descargas.editarDescargas', compact('usuario', 'descargas','descargas_seccion','descargas_edit'));
    }

    public function editDescarga($id)
    {
        $descarga = Descarga::find($id);
        $usuario = Auth::user();
        $descargas_seccion = 'active';
        $descargas_edit = 'active';

        return view('adm.descargas.editarDescarga', compact('descarga','usuario','descargas_seccion','descargas_edit'));
    }

    public function updateDescarga(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'descargas');
        $file_save ? $datos['imagen'] = $file_save : false;

        $descarga = Descarga::find($id);
        $descarga->fill($datos);
        $descarga->save();
        $success = 'Descarga editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyDescarga($id)
    {
        $descarga = Descarga::find($id);
        $descarga->delete();
        $success = 'Descarga eliminado correctamente';
        return back()->with('success', $success);
    }
}
