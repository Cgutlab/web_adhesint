<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\Solucion;
use Redirect;

class SolucionController extends Controller
{

    public function showSolucion()
    {
        $solucion = Solucion::find(1);
        $usuario = Auth::user();
        $soluciones_seccion = 'active';
        $soluciones_edit = 'active';
        return view('adm.soluciones.editarSolucion', compact('solucion','usuario','soluciones_seccion','soluciones_edit'));
    }


    public function updateSolucion(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'solucion');
        $file_save ? $datos['imagen'] = $file_save : false;

        $solucion = Solucion::find($id);
        $solucion->fill($datos);
        $solucion->save();
        $success = 'Solucion a Medida editada correctamente';
        return back()->with('success', $success);
    }
}
