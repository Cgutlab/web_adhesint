<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\Equipamiento;
use Redirect;


class EquipamientoController extends Controller
{
    function editarContenidos(){
        $usuario = Auth::user();
        $equipamientos = Equipamiento::all();
        $equipamientos_seccion = 'active';
        $equipamientos_edit = 'active';

        return view('adm.equipamiento.editarContenidos',  compact('usuario', 'equipamientos','equipamientos_edit','equipamientos_seccion'));
    }

    function editarContenido($id){
        $usuario = Auth::user();
        $equipamiento = Equipamiento::find($id);
        $equipamientos_seccion = 'active';
        $equipamientos_edit = 'active';

        return view('adm.equipamiento.editarContenido',  compact('usuario','equipamiento','equipamientos_edit','equipamientos_seccion'));
    }

    function updateContenido(Request $request, $id){
        $datos = $request->all();
        $equipamiento = Equipamiento::find($id);

       $file_save = Helpers::saveImage($request->file('imagen'), 'equipamiento');
        $file_save ? $datos['imagen'] = $file_save : false;

        $equipamiento->fill($datos);
        $equipamiento->save();
        $success = 'Equipamiento editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $equipamiento = Equipamiento::find($id);
        $equipamiento->delete();
        $success = 'Equipamiento eliminado correctamente';
        return back()->with('success', $success);
    }
}