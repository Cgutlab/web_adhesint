<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Illuminate\Html;
use App\Gallery;
use App\Product;

class GaleriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $active = 'galerias';
    }

    public function create()
    {

        return view('adm.galerias.create');
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerias');
        $file_save ? $datos['imagen'] = $file_save : false;

        Gallery::create($datos);
        $success = 'Registro creado correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $galerias = Gallery::orderBy('orden','asc')->paginate(10);
        return view('adm.galerias.index', compact('galerias'));
    }

    public function edit($id)
    {
        $galeria = Gallery::find($id);
        return view('adm.galerias.edit', compact('galeria'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'galerias');
        $file_save ? $datos['imagen'] = $file_save : false;

        $galeria = Gallery::find($id);
        $galeria->fill($datos);
        $galeria->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $galeria = Gallery::find($id);
        $galeria->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
