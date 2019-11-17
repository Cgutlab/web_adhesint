<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\vCategoria;
use App\vGaleria;

class vGaleriasController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_create = 'active';
        $cabanas = vCategoria::all();

        return view('adm.vgalerias.crearGaleria', compact('usuario','galerias_seccion','galerias_create', 'cabanas'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerias');
        $file_save ? $datos['imagen'] = $file_save : false;

        vGaleria::create($datos);
        $success = 'Categoria creada correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $usuario = Auth::user();
        $galerias = vGaleria::all();

        return view('adm.vgalerias.editarGalerias', compact('usuario', 'galerias','galerias_seccion','galerias_edit'));
    }

    public function edit($id)
    {
        $galeria = vGaleria::find($id);
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_edit = 'active';
        $categorias = vGaleria::all();

        return view('adm.vgalerias.editarGaleria', compact('galeria','usuario','galerias_seccion','galerias_edit', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerias');
        $file_save ? $datos['imagen'] = $file_save : false;

        $galeria = vGaleria::find($id);
        $galeria->fill($datos);
        $galeria->save();
        $success = 'Galeria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $galeria = vGaleria::find($id);
        $galeria->delete();
        $success = 'Galeria eliminado correctamente';
        return back()->with('success', $success);
    }
}
