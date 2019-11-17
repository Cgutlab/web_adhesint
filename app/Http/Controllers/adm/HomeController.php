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
use Redirect;

class HomeController extends Controller
{
  public function create($seccion)
  {
      $usuario = Auth::user();
      $home_contenido_create = 'active';

      return view('adm.contenido.crearContenido',  compact('usuario', 'home_contenido_create', 'seccion'));
  }

  public function store(Request $request)
  {
      $datos = $request->all();

      $file_save = Helpers::saveImage($request->file('imagen'), 'contenidos');
      $file_save ? $datos['imagen'] = $file_save : false;

      Content::create($datos);
      $success = 'Registrado creado correctamente';

      return back()->with('success', $success);
  }

  public function show($seccion)
  {
      $usuario = Auth::user();
      $contenidos = Content::where('seccion',$seccion)->paginate(8);
      $contenido_seccion = 'active';
      $contenido_edit = 'active';

      return view('adm.contenido.editarContenidos', compact('usuario', 'contenidos','contenido_seccion','contenido_edit'));
  }

  public function edit($id)
  {
      $contenido = Content::find($id);
      $usuario = Auth::user();
      $contenidos_seccion = 'active';
      $contenidos_edit = 'active';

      return view('adm.contenido.editarContenido', compact('productos', 'contenido','usuario','contenidos_seccion','contenidos_edit'));
  }

  public function update(Request $request, $id)
  {
      $datos = $request->all();

      $file_save = Helpers::saveImage($request->file('imagen'), 'contenidos');
      $file_save ? $datos['imagen'] = $file_save : false;

      $contenido = Content::find($id);
      $contenido->fill($datos);
      $contenido->save();
      $success = 'Registro editado correctamente';
      return back()->with('success', $success);
  }

  public function destroy($id)
  {
      $contenido = Content::find($id);
      $contenido->delete();
      $success = 'Registro eliminado correctamente';
      return back()->with('success', $success);
  }

    function editarDestacados(){
        $usuario = Auth::user();
        $destacados = Destacado::all();
        $destacados_seccion = 'active';
        $destacados_edit = 'active';

        return view('adm.home.editarDestacados',  compact('usuario', 'destacados','destacados_edit','destacados_seccion'));
    }

    function editarDestacado($id){
        $usuario = Auth::user();
        $destacado = Destacado::find($id);
        $destacados_seccion = 'active';
        $destacados_edit = 'active';

        return view('adm.home.editarDestacado',  compact('productos','usuario','destacado','destacados_edit','destacados_seccion'));
    }

    function updateDestacado(Request $request, $id){
        $datos = $request->all();
        $destacado = Destacado::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'destacados');
        $file_save ? $datos['imagen'] = $file_save : false;

        $destacado->fill($datos);
        $destacado->save();
        $success = 'Destacado editado correctamente';
        return back()->with('success', $success);
    }
}
