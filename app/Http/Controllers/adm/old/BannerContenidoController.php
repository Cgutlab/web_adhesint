<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\BannerContenido;

class BannerContenidoController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $bannercontenidos_seccion = 'active';
        $bannercontenidos_create = 'active';

        return view('adm.bannercontenido.crearBannerContenido', compact('usuario','bannercontenidos_seccion','bannercontenidos_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'bannercontenidos');
        $file_save ? $datos['imagen'] = $file_save : false;

        BannerContenido::create($datos);
        $success = 'BannerContenido creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $bannercontenidos = BannerContenido::all();
        $bannercontenidos_seccion = 'active';
        $bannercontenidos_edit = 'active';
        $bannercontenidos = BannerContenido::paginate(8);
       
        return view('adm.bannercontenido.editarBannerContenidos', compact('usuario', 'bannercontenidos','bannercontenidos_seccion','bannercontenidos_edit'));
    }

    public function edit($id)
    {
        $bannercontenido = BannerContenido::find($id);
        $usuario = Auth::user();
        $bannercontenidos_seccion = 'active';
        $bannercontenidos_edit = 'active';

        return view('adm.bannercontenido.editarBannerContenido', compact('bannercontenido','usuario','bannercontenidos_seccion','bannercontenidos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'bannercontenidos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $bannercontenido = BannerContenido::find($id);
        $bannercontenido->fill($datos);
        $bannercontenido->save();
        $success = 'BannerContenido editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $bannercontenido = BannerContenido::find($id);
        $bannercontenido->delete();
        $success = 'BannerContenido eliminado correctamente';
        return back()->with('success', $success);
    }
}
