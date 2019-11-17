<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\Texto;
use Redirect;

class TextosController extends Controller
{
    public function create($seccion)
    {
        $usuario = Auth::user();
        $home_contenido_create = 'active';

        return view('adm.textos.create',  compact('usuario', 'home_contenido_create', 'seccion'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'textos');
        $file_save ? $datos['imagen'] = $file_save : false;

        Texto::create($datos);
        $success = 'Registrado creado correctamente';

        return back()->with('success', $success);
    }

    public function show($seccion)
    {
        $usuario = Auth::user();
        $textos = Texto::where('seccion',$seccion)->paginate(8);
        $contenido_seccion = 'active';
        $contenido_edit = 'active';

        return view('adm.textos.index', compact('usuario', 'textos','contenido_seccion','contenido_edit'));
    }

    public function edit($id)
    {
        $contenido = Texto::find($id);
        $usuario = Auth::user();
        $textos_seccion = 'active';
        $textos_edit = 'active';

        return view('adm.textos.edit', compact('productos', 'contenido','usuario','textos_seccion','textos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'textos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $contenido = Texto::find($id);
        $contenido->fill($datos);
        $contenido->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $contenido = Texto::find($id);
        $contenido->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }

}
