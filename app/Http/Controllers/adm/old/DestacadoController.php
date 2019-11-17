<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\Destacado;

class DestacadoController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $destacados_seccion = 'active';
        $destacados_create = 'active';

        return view('adm.home.crearDestacado', compact('usuario','destacados_seccion','destacados_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'destacados');
        $file_save ? $datos['imagen'] = $file_save : false;

        Destacado::create($datos);
        $success = 'Destacado creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $destacados = Destacado::all();
        $destacados_seccion = 'active';
        $destacados_edit = 'active';
        $destacados = Destacado::paginate(8);

        return view('adm.home.editarDestacados', compact('usuario', 'destacados','destacados_seccion','destacados_edit'));
    }

    public function edit($id)
    {
        $destacado = Destacado::find($id);
        $usuario = Auth::user();
        $destacados_seccion = 'active';
        $destacados_edit = 'active';

        return view('adm.home.editarDestacado', compact('destacado','usuario','destacados_seccion','destacados_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'destacados');
        $file_save ? $datos['imagen'] = $file_save : false;

        $destacado = Destacado::find($id);
        $destacado->fill($datos);
        $destacado->save();
        $success = 'Destacado editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $destacado = Destacado::find($id);
        $destacado->delete();
        $success = 'Destacado eliminado correctamente';
        return back()->with('success', $success);
    }
}
