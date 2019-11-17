<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Publicacion;

class PublicacionController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $publicacions_seccion = 'active';
        $publicacions_create = 'active';

        return view('adm.publicacions.crearPublicacion', compact('usuario','publicacions_seccion','publicacions_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'publicacions');
        $file_save ? $datos['imagen'] = $file_save : false;

        Publicacion::create($datos);
        $success = 'Publicacion creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $publicacions = Publicacion::all();
        $publicacions_seccion = 'active';
        $publicacions_edit = 'active';
        $publicacions = Publicacion::paginate(8);
       
        return view('adm.publicacions.editarPublicacions', compact('usuario', 'publicacions','publicacions_seccion','publicacions_edit'));
    }

    public function edit($id)
    {
        $publicacion = Publicacion::find($id);
        $usuario = Auth::user();
        $publicacions_seccion = 'active';
        $publicacions_edit = 'active';

        return view('adm.publicacions.editarPublicacion', compact('publicacion','usuario','publicacions_seccion','publicacions_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'publicacions');
        $file_save ? $datos['imagen'] = $file_save : false;

        $publicacion = Publicacion::find($id);
        $publicacion->fill($datos);
        $publicacion->save();
        $success = 'Publicacion editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->delete();
        $success = 'Publicacion eliminado correctamente';
        return back()->with('success', $success);
    }
}
