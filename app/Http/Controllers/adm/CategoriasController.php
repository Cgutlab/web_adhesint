<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Illuminate\Html;
use App\Category;
use App\Producto;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $active = 'productos';
    }

    public function create()
    {

        return view('adm.categorias.create');
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        Category::create($datos);
        $success = 'Registro creado correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $categorias = Category::orderBy('orden','asc')->paginate(10);
        return view('adm.categorias.index', compact('categorias'));
    }

    public function edit($id)
    {
        $categoria = Category::find($id);
        return view('adm.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorias');
        $file_save ? $datos['imagen'] = $file_save : false;

        $categoria = Category::find($id);
        $categoria->fill($datos);
        $categoria->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $categoria = Category::find($id);
        $categoria->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
