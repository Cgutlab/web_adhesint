<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\GaleriaNovedad;
use App\ProductoNovedad;

class GaleriaNovedadController extends Controller
{
    //
    public function createGaleria()
    {
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_create = 'active';
        $productos = ProductoNovedad::all();
        return view('adm.galerianovedad.crearGaleriaNovedad', compact('usuario','galerias_seccion','galerias_create', 'productos'));
    }

    public function storeGaleria(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerianovedad');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'galerianovedad');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'galerianovedad');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'galerianovedad');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'galerianovedad');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'galerianovedad');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        GaleriaNovedad::create($datos);
        $success = 'Galeria creado correctamente';
        return back()->with('success', $success);
    }

    public function showGaleria()
    {                
        $usuario = Auth::user();
        $galerias = GaleriaNovedad::all();
        $galerias_seccion = 'active';
        $galerias_edit = 'active';
        $galerias = GaleriaNovedad::paginate(8);

        return view('adm.galerianovedad.editarGaleriaNovedads', compact('usuario', 'galerias','galerias_seccion','galerias_edit'));
    }

    public function listsGaleria($id)
    {                   
        $galerias = GaleriaNovedad::where('id_productos_novedads', $id)->paginate(8);
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_edit = 'active';
        
        return view('adm.galerianovedad.editarGaleriaNovedads', compact('usuario', 'galerias','galerias_seccion','galerias_edit'));
    }

    public function editGaleria($id)
    {
        $galeria = GaleriaNovedad::find($id);
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_edit = 'active';
        $productos = ProductoNovedad::all();
        return view('adm.galerianovedad.editarGaleriaNovedad', compact('galeria','usuario','galerias_seccion','galerias_edit','productos'));
    }

    public function updateGaleria(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerianovedad');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'galerianovedad');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'galerianovedad');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('ficha'), 'galerianovedad');
        $file_save ? $datos['ficha'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo'), 'galerianovedad');
        $file_save ? $datos['dibujo'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('dibujo1'), 'galerianovedad');
        $file_save ? $datos['dibujo1'] = $file_save : false;

        $galeria = GaleriaNovedad::find($id);
        $galeria->fill($datos);
        $galeria->save();
        $success = 'Galeria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyGaleria($id)
    {
        $galeria = GaleriaNovedad::find($id);
        $galeria->delete();
        $success = 'Galeria eliminado correctamente';
        return back()->with('success', $success);
    }
}
