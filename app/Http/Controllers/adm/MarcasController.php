<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Illuminate\Html;
use App\Marca;

class MarcasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $active = 'marcas';
    }

    public function create()
    {

        return view('adm.marcas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'marcas');
        $file_save ? $datos['imagen'] = $file_save : false;

        Marca::create($datos);
        $success = 'Registro creado correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $marcas = Marca::orderBy('orden','asc')->paginate(10);
        return view('adm.marcas.index', compact('marcas'));
    }

    public function edit($id)
    {
        $marca = Marca::find($id);
        return view('adm.marcas.edit', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'marcas');
        $file_save ? $datos['imagen'] = $file_save : false;

        $marca = Marca::find($id);
        $marca->fill($datos);
        $marca->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $marca = Marca::find($id);
        $marca->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
