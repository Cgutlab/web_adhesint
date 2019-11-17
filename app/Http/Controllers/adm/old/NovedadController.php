<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Novedad;
use App\Categoria;

class NovedadController extends Controller
{
    public function createNovedad()
    {
        $usuario = Auth::user();
        $novedades_seccion = 'active';
        $novedades_create = 'active';

        $categorias = Categoria::all();

        return view('adm.novedades.crearNovedad', compact('categorias','usuario','novedades_seccion','novedades_create'));
    }

    public function storeNovedad(Request $request)
    {
        $novedad = new Novedad();
        $id = Novedad::all()->max('id');
        $id++;

        $novedad->titulo       = $request->titulo;
        $novedad->breve        = $request->breve;
        $novedad->resena       = $request->resena;
        $novedad->fecha        = $request->fecha;
        $novedad->descripcion  = $request->descripcion;
        $novedad->id_categoria = $request->id_categoria;      

          if ($request->hasFile('imagen')){
              if ($request->file('imagen')->isValid()){
                  $file = $request->file('imagen');
                  $path = public_path('imagenes/novedades/');
                  $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                  $novedad->imagen = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('pdf')){
              if ($request->file('pdf')->isValid()){
                  $file = $request->file('pdf');
                  $path = public_path('imagenes/novedades/pdf/');
                  $request->file('pdf')->move($path, $id.'_'.$file->getClientOriginalName());
                  $novedad->pdf = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          
        $novedad->save();
        $success = 'Novedad creada correctamente';
        return back()->with('success', $success);
    }

    public function showNovedad()
    {                
        $usuario = Auth::user();
        $novedades = Novedad::all();
        $novedades_seccion = 'active';
        $novedades_edit = 'active';
        $novedades = Novedad::paginate(8);

        return view('adm.novedades.editarNovedades', compact('usuario', 'novedades','novedades_seccion','novedades_edit'));
    }
    public function editNovedad($id)
    {
        $novedad = Novedad::find($id);
        $usuario = Auth::user();
        $novedades_seccion = 'active';
        $novedades_edit = 'active';

        $categorias = Categoria::all();

        return view('adm.novedades.editarNovedad', compact('categorias','categoryas','novedad','usuario','novedades_seccion','novedades_edit'));
    }

    public function updateNovedad(Request $request, $id)
    {
        $novedad = Novedad::find($id);
        $novedad->titulo       = $request->titulo;
        $novedad->breve        = $request->breve;
        $novedad->resena       = $request->resena;
        $novedad->fecha        = $request->fecha;
        $novedad->descripcion  = $request->descripcion;
        $novedad->id_categoria = $request->id_categoria;      

          if ($request->hasFile('imagen')){
              if ($request->file('imagen')->isValid()){
                  $file = $request->file('imagen');
                  $path = public_path('imagenes/novedades/');
                  $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                  $novedad->imagen = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('pdf')){
              if ($request->file('pdf')->isValid()){
                  $file = $request->file('pdf');
                  $path = public_path('imagenes/novedades/pdf/');
                  $request->file('pdf')->move($path, $id.'_'.$file->getClientOriginalName());
                  $novedad->pdf = '' . $id.'_'.$file->getClientOriginalName();
              }
          }

        $novedad->save();
        $success = 'Novedad editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyNovedad($id)
    {
        $novedad = Novedad::find($id);
        $novedad->delete();
        $success = 'Novedad eliminado correctamente';
        return back()->with('success', $success);
    }
}
