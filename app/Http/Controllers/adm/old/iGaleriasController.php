<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\iCabana;
use App\iGaleria;

class iGaleriasController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_create = 'active';
        $cabanas = iCabana::all();

        return view('adm.cabanas.crearGaleria', compact('usuario','galerias_seccion','galerias_create', 'cabanas'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerias');
        $file_save ? $datos['imagen'] = $file_save : false;

        iGaleria::create($datos);
        $success = 'Categoria creada correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {                
        $usuario = Auth::user();
        $galerias = iGaleria::all();

        return view('adm.cabanas.editarGalerias', compact('usuario', 'galerias','galerias_seccion','galerias_edit'));
    }

    public function edit($id)
    {
        $galeria = iGaleria::find($id);
        $usuario = Auth::user();
        $galerias_seccion = 'active';
        $galerias_edit = 'active';
        $categorias = iGaleria::all();

        return view('adm.cabanas.editarGaleria', compact('galeria','usuario','galerias_seccion','galerias_edit', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerias');
        $file_save ? $datos['imagen'] = $file_save : false;

        $galeria = iGaleria::find($id);
        $galeria->fill($datos);
        $galeria->save();
        $success = 'Galeria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $galeria = iGaleria::find($id);
        $galeria->delete();
        $success = 'Galeria eliminado correctamente';
        return back()->with('success', $success);
    }
}
