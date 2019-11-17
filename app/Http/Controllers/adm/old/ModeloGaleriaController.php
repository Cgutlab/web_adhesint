<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\ModeloGaleria;
use App\ModeloContenido;

class ModeloGaleriaController extends Controller
{
    //
    public function createArticulo()
    {
        $modelos_cont = ModeloContenido::all();

        $usuario = Auth::user();
        $modelos_seccion = 'active';
        $modelos_create = 'active';
        
        return view('adm.modelogaleria.crearModeloGaleria', compact('usuario','modelos_seccion','modelos_create', 'seccion','modelos_cont'));
    }

    public function storeArticulo(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'modelogaleria');
        $file_save ? $datos['imagen'] = $file_save : false;

        ModeloGaleria::create($datos);
        $success = 'Articulo creado correctamente';
        return back()->with('success', $success);
    }

    public function showArticulo()
    {                
        $modelos_cont = ModeloContenido::all();

        $usuario = Auth::user();
        $modelos = ModeloGaleria::all();
        $modelos_seccion = 'active';
        $modelos_edit = 'active';
        $modelos = ModeloGaleria::paginate(8);

        return view('adm.modelogaleria.editarModeloGalerias', compact('usuario', 'modelos','modelos_seccion','modelos_edit','modelos_cont'));
    }

    /* ARTICULOS FILTRADOS */
    public function listsArticulo($id)
    {                   
        $modelos = ModeloGaleria::where('seccion', $id)->paginate(8);
        $usuario = Auth::user();
        $modelos_seccion = 'active';
        $modelos_edit = 'active';
        $modelos_seccion = 'active';
        $modelos_edit = 'active';
        

        return view('adm.modelogaleria.editarModeloGalerias', compact('usuario', 'modelos','modelos_seccion','modelos_edit','modelos_cont'));
    }/* ARTICULOS FILTRADOS */

    public function editArticulo($id)
    {
        $modelos_cont = ModeloContenido::all();
        
        $modelo = ModeloGaleria::find($id);
        $usuario = Auth::user();
        $modelos_seccion = 'active';
        $modelos_edit = 'active';

        return view('adm.modelogaleria.editarModeloGaleria', compact('modelo','usuario','modelos_seccion','modelos_edit','modelos_cont'));
    }

    public function updateArticulo(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'modelogaleria');
        $file_save ? $datos['imagen'] = $file_save : false;

        $modelo = ModeloGaleria::find($id);
        $modelo->fill($datos);
        $modelo->save();
        $success = 'Articulo editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyArticulo($id)
    {
        $modelo = ModeloGaleria::find($id);
        $modelo->delete();
        $success = 'Articulo eliminado correctamente';
        return back()->with('success', $success);
    }
}
