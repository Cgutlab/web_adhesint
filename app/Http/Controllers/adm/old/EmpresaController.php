<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\Empresa;
use App\Slider;
use Redirect;

class EmpresaController extends Controller
{
    function crearSlider(){
        $usuario = Auth::user();
        $seccion = 2;
        $sliders_seccion = 'active';
        $empresa_slider_create = 'active';
        return view('adm.empresa.crearSlider',  compact('usuario', 'seccion','sliders_seccion','empresa_slider_create'));
    }

    function editarSliders(){
        $usuario = Auth::user();
        $sliders = Slider::where('seccion', 2)->get();
        $sliders_seccion = 'active';
        $empresa_slider_edit = 'active';
        $seccion = 2;
        return view('adm.empresa.editarSliders',  compact('usuario', 'sliders','sliders_seccion','empresa_slider_edit', 'seccion'));
    }

    function editarSlider($id){
        $usuario = Auth::user();
        $slider = Slider::find($id);
        $sliders_seccion = 'active';
        $empresa_slider_edit = 'active';

        return view('adm.empresa.editarSlider',  compact('usuario', 'slider','sliders_seccion','empresa_slider_edit'));
    }

    function editarContenido(){
        $usuario = Auth::user();
        $empresa = Empresa::find(1);
        $empresa_seccion = 'active';
        $empresa_contenido_edit = 'active';

        return view('adm.empresa.editarContenido',  compact('usuario','empresa','empresa_contenido_edit','empresa_seccion'));
    }

    function updateContenido(Request $request, $id){
        $datos = $request->all();
        $empresa = Empresa::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'empresa');
        $file_save ? $datos['imagen'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('imagen2'), 'empresa');
        $file_save ? $datos['imagen2'] = $file_save : false;

        $empresa->fill($datos);
        $empresa->save();
        $success = 'Empresa editada correctamente';
        return back()->with('success', $success);
    }


}
