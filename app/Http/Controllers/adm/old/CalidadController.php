<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\Calidad;
use Redirect;

class CalidadController extends Controller
{

    public function showCalidad()
    {
        $calidad = Calidad::find(1);
        $usuario = Auth::user();
        $calidades_seccion = 'active';
        $calidades_edit = 'active';
        return view('adm.calidad.editarCalidad', compact('calidad','usuario','calidades_seccion','calidades_edit'));
    }


    public function updateCalidad(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'calidad');
        $file_save ? $datos['imagen'] = $file_save : false;

        $calidad = Calidad::find($id);
        $calidad->fill($datos);
        $calidad->save();
        $success = 'Calidad a Medida editada correctamente';
        return back()->with('success', $success);
    }
}
