<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Illuminate\Html;
use App\Presentacion;

class PresentacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $active = 'presentaciones';
    }

    public function create()
    {

        return view('adm.presentaciones.create');
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'presentacion');
        $file_save ? $datos['imagen'] = $file_save : false;

        Presentacion::create($datos);
        $success = 'Registro creado correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $presentaciones = Presentacion::orderBy('orden','asc')->paginate(10);
        return view('adm.presentaciones.index', compact('presentaciones'));
    }

    public function edit($id)
    {
        $marca = Presentacion::find($id);
        return view('adm.presentaciones.edit', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'presentacion');
        $file_save ? $datos['imagen'] = $file_save : false;

        $marca = Presentacion::find($id);
        $marca->fill($datos);
        $marca->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $marca = Presentacion::find($id);
        $marca->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
