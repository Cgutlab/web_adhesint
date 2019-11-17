<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Data;
use Redirect;

class DatosController extends Controller
{

    public function index()
    {
        $datos = Data::all();
        $usuario = Auth::user();
        $datos_seccion = 'active';
        $datos_edit = 'active';
        return view('adm.datos.editarDatos', compact('datos','usuario','datos_seccion','datos_edit'));
    }

    public function edit($id)
    {
        $dato = Data::find($id);
        $usuario = Auth::user();
        $datos_seccion = 'active';
        $datos_edit = 'active';
        return view('adm.datos.editarDato', compact('dato','usuario','datos_seccion','datos_edit'));
    }

    public function update(Request $request, $id)
    {
        $dato = Data::find($id);
        $dato->fill($request->all());
        $dato->save();
        $success = 'Dato editado correctamente';
        return Redirect::to('adm/datos')->with('success', $success);
    }
}
