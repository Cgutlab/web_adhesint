<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Correo;

class CorreoController extends Controller
{
    public function createCorreo()
    {
        $usuario = Auth::user();
        $correos_seccion = 'active';
        $correos_create = 'active';

        return view('adm.correos.crearCorreo', compact('productos', 'usuario','correos_seccion','correos_create'));
    }

    public function storeCorreo(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'publicidad');
        $file_save ? $datos['imagen'] = $file_save : false;

        Correo::create($datos);
        $success = 'Articulo creado correctamente';
        return back()->with('success', $success);
    }

    public function showCorreo()
    {
        $usuario = Auth::user();
        $correos = Correo::all();
        $correos_seccion = 'active';
        $correos_edit = 'active';
        $correos = Correo::paginate(9);
       

        return view('adm.correos.editarCorreos', compact('productos', 'usuario', 'correos','correos_seccion','correos_edit'));
    }

    public function editCorreo($id)
    {
        $correo = Correo::find($id);
        $usuario = Auth::user();
        $correos_seccion = 'active';
        $correos_edit = 'active';

        return view('adm.correos.editarCorreo', compact('productos', 'correo','usuario','correos_seccion','correos_edit'));
    }

    public function updateCorreo(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), $id.'');
        $file_save ? $datos['imagen'] = $file_save : false;

        $correo = Correo::find($id);
        $correo->fill($datos);
        $correo->save();
        $success = 'Articulo editado correctamente';
        return back()->with('success', $success);
    }

    public function destroyCorreo($id)
    {
        $correo = Correo::find($id);
        $correo->delete();
        $success = 'Correo eliminado correctamente';
        return back()->with('success', $success);
    }
}
