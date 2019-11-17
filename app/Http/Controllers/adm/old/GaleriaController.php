<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriaRequest;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Galeria;
use App\Producto;

class GaleriaController extends Controller
{
    public function createGaleria()
    {
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_create = 'active';

        $productos = Producto::all();

        return view('adm.galerias.crearGaleria', compact('productos', 'usuario','galerias_seccion','galerias_create'));
    }

    public function storeGaleria(GaleriaRequest $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galeria');
        $file_save ? $datos['imagen'] = $file_save : false;

        Galeria::create($datos);
        $success = 'Imagen creada correctamente';
        return back()->with('success', $success);
    }

    public function showGaleria()
    {
        $usuario = Auth::user();
        $galerias = Galeria::all();
        $galerias_seccion = 'active';
        $galerias_edit = 'active';
        $galerias = Galeria::paginate(9);
        
        $productos = Producto::orderBy('titulo','asc')->get();

        return view('adm.galerias.editarGalerias', compact('productos', 'usuario', 'galerias','galerias_seccion','galerias_edit'));
    }

    public function editGaleria($id)
    {
        $galeria = Galeria::find($id);
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_edit = 'active';

        $productos = Producto::all();

        return view('adm.galerias.editarGaleria', compact('productos', 'galeria','usuario','galerias_seccion','galerias_edit'));
    }

    public function updateGaleria(GaleriaRequest $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galeria');
        $file_save ? $datos['imagen'] = $file_save : false;

        $galeria = Galeria::find($id);
        $galeria->fill($datos);
        $galeria->save();
        $success = 'Articulo editado correctamente';
        return back()->with('success', $success);
    }

    public function destroyGaleria($id)
    {
        $galeria = Galeria::find($id);
        $galeria->delete();
        $success = 'Galeria eliminado correctamente';
        return back()->with('success', $success);
    }
}
