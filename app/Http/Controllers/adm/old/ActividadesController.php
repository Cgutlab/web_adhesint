<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\Actividad;

class ActividadesController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $actividades_seccion = 'active';
        $actividades_create = 'active';

        return view('adm.actividades.crearActividad', compact('usuario','actividades_seccion','actividades_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'actividades');
        $file_save ? $datos['imagen'] = $file_save : false;

        Actividad::create($datos);
        $success = 'Actividad creado correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $usuario = Auth::user();
        $actividades = Actividad::all();
        $actividades_seccion = 'active';
        $actividades_edit = 'active';
        $actividades = Actividad::paginate(8);

        return view('adm.actividades.editarActividades', compact('usuario', 'actividades','actividades_seccion','actividades_edit'));
    }

    public function edit($id)
    {
        $actividad = Actividad::find($id);
        $usuario = Auth::user();
        $actividades_seccion = 'active';
        $actividades_edit = 'active';

        return view('adm.actividades.editarActividad', compact('actividad','usuario','actividades_seccion','actividades_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'actividades');
        $file_save ? $datos['imagen'] = $file_save : false;

        $actividad = Actividad::find($id);
        $actividad->fill($datos);
        $actividad->save();
        $success = 'Actividad editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $actividad->delete();
        $success = 'Actividad eliminado correctamente';
        return back()->with('success', $success);
    }
}
