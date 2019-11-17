<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\ServContenido;

class ServContenidoController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $servcontenidos_seccion = 'active';
        $servcontenidos_create = 'active';

        return view('adm.servcontenidos.crearServContenido', compact('usuario','servcontenidos_seccion','servcontenidos_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'servcontenidos');
        $file_save ? $datos['imagen'] = $file_save : false;

        ServContenido::create($datos);
        $success = 'Servicio creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $servcontenidos = ServContenido::all();
        $servcontenidos_seccion = 'active';
        $servcontenidos_edit = 'active';
        $servcontenidos = ServContenido::paginate(8);
       
        return view('adm.servcontenidos.editarServContenidos', compact('usuario', 'servcontenidos','servcontenidos_seccion','servcontenidos_edit'));
    }

    public function edit($id)
    {
        $servcontenido = ServContenido::find($id);
        $usuario = Auth::user();
        $servcontenidos_seccion = 'active';
        $servcontenidos_edit = 'active';

        return view('adm.servcontenidos.editarServContenido', compact('servcontenido','usuario','servcontenidos_seccion','servcontenidos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'servcontenidos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $servcontenido = ServContenido::find($id);
        $servcontenido->fill($datos);
        $servcontenido->save();
        $success = 'Servicio editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $servcontenido = ServContenido::find($id);
        $servcontenido->delete();
        $success = 'Servicio eliminado correctamente';
        return back()->with('success', $success);
    }
}
