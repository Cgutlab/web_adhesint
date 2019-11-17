<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\BannerIcono;

class BannerIconoController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $bannericonos_seccion = 'active';
        $bannericonos_create = 'active';

        return view('adm.bannericono.crearBannerIcono', compact('usuario','bannericonos_seccion','bannericonos_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'bannericonos');
        $file_save ? $datos['imagen'] = $file_save : false;

        BannerIcono::create($datos);
        $success = 'BannerIcono creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $bannericonos = BannerIcono::all();
        $bannericonos_seccion = 'active';
        $bannericonos_edit = 'active';
        $bannericonos = BannerIcono::paginate(8);
       
        return view('adm.bannericono.editarBannerIconos', compact('usuario', 'bannericonos','bannericonos_seccion','bannericonos_edit'));
    }

    public function edit($id)
    {
        $bannericono = BannerIcono::find($id);
        $usuario = Auth::user();
        $bannericonos_seccion = 'active';
        $bannericonos_edit = 'active';

        return view('adm.bannericono.editarBannerIcono', compact('bannericono','usuario','bannericonos_seccion','bannericonos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'bannericonos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $bannericono = BannerIcono::find($id);
        $bannericono->fill($datos);
        $bannericono->save();
        $success = 'BannerIcono editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $bannericono = BannerIcono::find($id);
        $bannericono->delete();
        $success = 'BannerIcono eliminado correctamente';
        return back()->with('success', $success);
    }
}
