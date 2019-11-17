<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Tiempo;

class TiempoController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $tiempos_seccion = 'active';
        $tiempos_create = 'active';

        return view('adm.tiempos.crearTiempo', compact('usuario','tiempos_seccion','tiempos_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'tiempos');
        $file_save ? $datos['imagen'] = $file_save : false;

        Tiempo::create($datos);
        $success = 'Tiempo creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $tiempos = Tiempo::all();
        $tiempos_seccion = 'active';
        $tiempos_edit = 'active';
        $tiempos = Tiempo::paginate(8);
       
        return view('adm.tiempos.editarTiempos', compact('usuario', 'tiempos','tiempos_seccion','tiempos_edit'));
    }

    public function edit($id)
    {
        $tiempo = Tiempo::find($id);
        $usuario = Auth::user();
        $tiempos_seccion = 'active';
        $tiempos_edit = 'active';

        return view('adm.tiempos.editarTiempo', compact('tiempo','usuario','tiempos_seccion','tiempos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'tiempos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $tiempo = Tiempo::find($id);
        $tiempo->fill($datos);
        $tiempo->save();
        $success = 'Tiempo editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $tiempo = Tiempo::find($id);
        $tiempo->delete();
        $success = 'Tiempo eliminado correctamente';
        return back()->with('success', $success);
    }
}
