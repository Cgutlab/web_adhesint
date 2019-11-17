<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Laracasts\Flash\Flash;
use App\HomeCliente;
use App\Content;
use App\Destacado;
use App\Slider;
use App\Banner;
use Redirect;

class BannerController extends Controller
{
    public function create($seccion)
    {
        $usuario = Auth::user();
        $home_banner_create = 'active';
        $seccion = $seccion;
        return view('adm.banner.create',  compact('usuario', 'home_banner_create', 'seccion'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'banners');
        $file_save ? $datos['imagen'] = $file_save : false;

        Banner::create($datos);
        $success = 'Registrado creado correctamente';

        return back()->with('success', $success);
    }

    public function show($seccion)
    {
        $usuario = Auth::user();
        $banner = Banner::where('seccion',$seccion)->paginate(8);
        $banner_seccion = 'active';
        $banner_edit = 'active';
        $seccion = $seccion;
        return view('adm.banner.index', compact('usuario', 'banner','banner_seccion','banner_edit'));
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        $usuario = Auth::user();
        $banners_seccion = 'active';
        $banners_edit = 'active';

        return view('adm.banner.edit', compact('productos', 'banner','usuario','banners_seccion','banners_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'banners');
        $file_save ? $datos['imagen'] = $file_save : false;

        $banner = Banner::find($id);
        $banner->fill($datos);
        $banner->save();
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
