<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\ModalRealizado;

class ModalRealizadoController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $modalrealizados_seccion = 'active';
        $modalrealizados_create = 'active';

        return view('adm.modalrealizados.crearModalRealizado', compact('usuario','modalrealizados_seccion','modalrealizados_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'modalrealizados');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'modalrealizados');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'modalrealizados');
        $file_save ? $datos['imagen2'] = $file_save : false;

        ModalRealizado::create($datos);
        $success = 'Artículo creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $modalrealizados = ModalRealizado::all();
        $modalrealizados_seccion = 'active';
        $modalrealizados_edit = 'active';
        $modalrealizados = ModalRealizado::paginate(8);
       
        return view('adm.modalrealizados.editarModalRealizados', compact('usuario', 'modalrealizados','modalrealizados_seccion','modalrealizados_edit'));
    }

    public function edit($id)
    {
        $modalrealizado = ModalRealizado::find($id);
        $usuario = Auth::user();
        $modalrealizados_seccion = 'active';
        $modalrealizados_edit = 'active';

        return view('adm.modalrealizados.editarModalRealizado', compact('modalrealizado','usuario','modalrealizados_seccion','modalrealizados_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'modalrealizados');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen1'), 'modalrealizados');
        $file_save ? $datos['imagen1'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'modalrealizados');
        $file_save ? $datos['imagen2'] = $file_save : false;
        
        $modalrealizado = ModalRealizado::find($id);
        $modalrealizado->fill($datos);
        $modalrealizado->save();
        $success = 'Artículo editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $modalrealizado = ModalRealizado::find($id);
        $modalrealizado->delete();
        $success = 'Artículo eliminado correctamente';
        return back()->with('success', $success);
    }
}
