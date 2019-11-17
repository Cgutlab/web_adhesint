<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\Trabajamo;

class TrabajamosController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $trabajamos_seccion = 'active';
        $trabajamos_create = 'active';

        return view('adm.trabajamos.crearTrabajamo', compact('usuario','trabajamos_seccion','trabajamos_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'trabajamos');
        $file_save ? $datos['imagen'] = $file_save : false;

        Trabajamo::create($datos);
        $success = 'Trabajamo creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {                
        $usuario = Auth::user();
        $trabajamos = Trabajamo::all();
        $trabajamos_seccion = 'active';
        $trabajamos_edit = 'active';
        $trabajamos = Trabajamo::paginate(8);

        return view('adm.trabajamos.editarTrabajamos', compact('usuario', 'trabajamos','trabajamos_seccion','trabajamos_edit'));
    }

    public function edit($id)
    {
        $trabajamo = Trabajamo::find($id);
        $usuario = Auth::user();
        $trabajamos_seccion = 'active';
        $trabajamos_edit = 'active';

        return view('adm.trabajamos.editarTrabajamo', compact('trabajamo','usuario','trabajamos_seccion','trabajamos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'trabajamos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $trabajamo = Trabajamo::find($id);
        $trabajamo->fill($datos);
        $trabajamo->save();
        $success = 'Trabajamo editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $trabajamo = Trabajamo::find($id);
        $trabajamo->delete();
        $success = 'Trabajamo eliminado correctamente';
        return back()->with('success', $success);
    }
}
