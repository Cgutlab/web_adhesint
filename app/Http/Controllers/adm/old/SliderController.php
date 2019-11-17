<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests\SliderRequest;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\Slider;
use Redirect;

class SliderController extends Controller
{
    public function create($seccion)
    {
        $usuario = Auth::user();
        $home_slider_create = 'active';

        return view('adm.sliders.crearSlider',  compact('usuario', 'home_slider_create', 'seccion'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'sliders');
        $file_save ? $datos['imagen'] = $file_save : false;

        Slider::create($datos);
        $success = 'Registrado creado correctamente';

        return back()->with('success', $success);
    }

    public function show($seccion)
    {
        $usuario = Auth::user();
        $sliders = Slider::where('seccion',$seccion)->paginate(8);
        $slider_seccion = 'active';
        $slider_edit = 'active';

        return view('adm.sliders.editarSliders', compact('usuario', 'sliders','slider_seccion','slider_edit'));
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $usuario = Auth::user();
        $sliders_seccion = 'active';
        $sliders_edit = 'active';

        return view('adm.sliders.editarSlider', compact('productos', 'slider','usuario','sliders_seccion','sliders_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'sliders');
        $file_save ? $datos['imagen'] = $file_save : false;

        $slider = Slider::find($id);
        $slider->fill($datos);
        $slider->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }

}
