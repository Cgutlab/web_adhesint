<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\iCabana;

class iCategoriasController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $cabanas_seccion = 'active';
        $cabanas_create = 'active';

        return view('adm.cabanas.crearCategoria', compact('usuario','cabanas_seccion','cabanas_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'cabanas');
        $file_save ? $datos['imagen'] = $file_save : false;

        iCabana::create($datos);
        $success = 'Categoria creada correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {                
        $usuario = Auth::user();
        $cabanas = iCabana::all();

        return view('adm.cabanas.editarCategorias', compact('usuario', 'cabanas','cabanas_seccion','cabanas_edit'));
    }

    public function edit($id)
    {
        $cabana = iCabana::find($id);
        $usuario = Auth::user();
        $cabanas_seccion = 'active';
        $cabanas_edit = 'active';

        return view('adm.cabanas.editarCategoria', compact('cabana','usuario','cabanas_seccion','cabanas_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'cabanas');
        $file_save ? $datos['imagen'] = $file_save : false;

        $cabana = iCabana::find($id);
        $cabana->fill($datos);
        $cabana->save();
        $success = 'Cabana editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $cabana = iCabana::find($id);
        $cabana->delete();
        $success = 'Cabana eliminado correctamente';
        return back()->with('success', $success);
    }
}
