<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use Illuminate\Html;
use App\Video;

class VideosController extends Controller
{
    //
    public function create()
    {
        $usuario = Auth::user();
        $videos_seccion = 'active';
        $videos_create = 'active';

        return view('adm.videos.crearVideo', compact('usuario','videos_seccion','videos_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'videos');
        $file_save ? $datos['imagen'] = $file_save : false;

        Video::create($datos);
        $success = 'Video creado correctamente';
        return back()->with('success', $success);
    }

    public function index()
    {
        $usuario = Auth::user();
        $videos = Video::all();
        $videos_seccion = 'active';
        $videos_edit = 'active';
        $videos = Video::paginate(8);

        return view('adm.videos.editarVideos', compact('usuario', 'videos','videos_seccion','videos_edit'));
    }

    public function edit($id)
    {
        $video = Video::find($id);
        $usuario = Auth::user();
        $videos_seccion = 'active';
        $videos_edit = 'active';

        return view('adm.videos.editarVideo', compact('video','usuario','videos_seccion','videos_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'videos');
        $file_save ? $datos['imagen'] = $file_save : false;

        $video = Video::find($id);
        $video->fill($datos);
        $video->save();
        $success = 'Video editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        $success = 'Video eliminado correctamente';
        return back()->with('success', $success);
    }
}
