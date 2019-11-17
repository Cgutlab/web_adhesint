<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\ServDestacado;

class ServDestacadoController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $servdestacados_seccion = 'active';
        $servdestacados_create = 'active';

        return view('adm.servdestacados.crearServDestacado', compact('usuario','servdestacados_seccion','servdestacados_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'servdestacados');
        $file_save ? $datos['imagen'] = $file_save : false;

        ServDestacado::create($datos);
        $success = 'Servicio creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $servdestacados = ServDestacado::all();
        $servdestacados_seccion = 'active';
        $servdestacados_edit = 'active';
        $servdestacados = ServDestacado::paginate(8);
       
        return view('adm.servdestacados.editarServDestacados', compact('usuario', 'servdestacados','servdestacados_seccion','servdestacados_edit'));
    }

    public function edit($id)
    {
        $servdestacado = ServDestacado::find($id);
        $usuario = Auth::user();
        $servdestacados_seccion = 'active';
        $servdestacados_edit = 'active';

        return view('adm.servdestacados.editarServDestacado', compact('servdestacado','usuario','servdestacados_seccion','servdestacados_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'servdestacados');
        $file_save ? $datos['imagen'] = $file_save : false;

        $servdestacado = ServDestacado::find($id);
        $servdestacado->fill($datos);
        $servdestacado->save();
        $success = 'Servicio editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $servdestacado = ServDestacado::find($id);
        $servdestacado->delete();
        $success = 'Servicio eliminado correctamente';
        return back()->with('success', $success);
    }
}
