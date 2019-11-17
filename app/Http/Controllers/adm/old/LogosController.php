<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\Logo;
use Redirect;

class LogosController extends Controller
{

    public function index()
    {
        $logos = Logo::paginate(8);
        $usuario = Auth::user();
        $logos_seccion = 'active';
        $logos_edit = 'active';
        return view('adm.logos.editarLogos', compact('logos','usuario','logos_seccion','logos_edit'));
    }

    public function edit($id)
    {
        $logo = Logo::find($id);
        $usuario = Auth::user();
        $logos_seccion = 'active';
        $logos_edit = 'active';
        return view('adm.logos.editarLogo', compact('logo','usuario','logos_seccion','logos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $logo = Logo::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'logos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $logo->fill($datos);
        $logo->save();
        $success = 'Logo editado correctamente';
        return Redirect::to('adm/logos')->with('success', $success);
    }

}
