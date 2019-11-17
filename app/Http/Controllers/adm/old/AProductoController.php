<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\AProducto;
use App\ACategoria;

class AProductoController extends Controller
{
    public function createAProducto()
    {
        $usuario = Auth::user();
        $aproductos_seccion = 'active';
        $aproductos_create = 'active';

        $acategorias = ACategoria::all();

        return view('adm.aproductos.crearAProducto', compact('acategorias','usuario','aproductos_seccion','aproductos_create'));
    }

    public function storeAProducto(Request $request)
    {
        $aproducto = new AProducto();
        $id = AProducto::all()->max('id');
        $id++;

        $aproducto->titulo       = $request->titulo;
        $aproducto->breve        = $request->breve;
        $aproducto->resena       = $request->resena;
        $aproducto->texto1       = $request->texto1;
        $aproducto->orden        = $request->orden;     
        $aproducto->id_acategoria = $request->id_acategoria;      

          if ($request->hasFile('imagen')){
              if ($request->file('imagen')->isValid()){
                  $file = $request->file('imagen');
                  $path = public_path('imagenes/textil_productos/');
                  $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                  $aproducto->imagen = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('pdf')){
              if ($request->file('pdf')->isValid()){
                  $file = $request->file('pdf');
                  $path = public_path('imagenes/textil_productos/pdf/');
                  $request->file('pdf')->move($path, $id.'_'.$file->getClientOriginalName());
                  $aproducto->pdf = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          
        $aproducto->save();
        $success = 'Producto creada correctamente';
        return back()->with('success', $success);
    }

    public function showAProducto()
    {                
        $usuario = Auth::user();
        $aproductos = AProducto::all();
        $aproductos_seccion = 'active';
        $aproductos_edit = 'active';
        $aproductos = AProducto::paginate(8);

        return view('adm.aproductos.editarAProductos', compact('usuario', 'aproductos','aproductos_seccion','aproductos_edit'));
    }
    public function editAProducto($id)
    {
        $aproducto = AProducto::find($id);
        $usuario = Auth::user();
        $aproductos_seccion = 'active';
        $aproductos_edit = 'active';

        $acategorias = ACategoria::all();

        return view('adm.aproductos.editarAProducto', compact('acategorias','categoryas','aproducto','usuario','aproductos_seccion','aproductos_edit'));
    }

    public function updateAProducto(Request $request, $id)
    {
        $aproducto = AProducto::find($id);
        $aproducto->titulo       = $request->titulo;
        $aproducto->breve        = $request->breve;
        $aproducto->resena       = $request->resena;
        $aproducto->texto1       = $request->texto1;
        $aproducto->orden        = $request->orden;        
        $aproducto->id_acategoria = $request->id_acategoria;      

          if ($request->hasFile('imagen')){
              if ($request->file('imagen')->isValid()){
                  $file = $request->file('imagen');
                  $path = public_path('imagenes/textil_productos/');
                  $request->file('imagen')->move($path, $id.'_'.$file->getClientOriginalName());
                  $aproducto->imagen = '' . $id.'_'.$file->getClientOriginalName();
              }
          }
          if ($request->hasFile('pdf')){
              if ($request->file('pdf')->isValid()){
                  $file = $request->file('pdf');
                  $path = public_path('imagenes/textil_productos/pdf/');
                  $request->file('pdf')->move($path, $id.'_'.$file->getClientOriginalName());
                  $aproducto->pdf = '' . $id.'_'.$file->getClientOriginalName();
              }
          }

        $aproducto->save();
        $success = 'Producto editada correctamente';
        return back()->with('success', $success);
    }

    public function destroyAProducto($id)
    {
        $aproducto = AProducto::find($id);
        $aproducto->delete();
        $success = 'Producto eliminado correctamente';
        return back()->with('success', $success);
    }
}
