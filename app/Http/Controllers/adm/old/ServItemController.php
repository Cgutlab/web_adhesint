<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\ServItem;

class ServItemController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $servitems_seccion = 'active';
        $servitems_create = 'active';

        return view('adm.servitems.crearServItem', compact('usuario','servitems_seccion','servitems_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'servitems');
        $file_save ? $datos['imagen'] = $file_save : false;

        ServItem::create($datos);
        $success = 'Servicio creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $servitems = ServItem::all();
        $servitems_seccion = 'active';
        $servitems_edit = 'active';
        $servitems = ServItem::paginate(8);
       
        return view('adm.servitems.editarServItems', compact('usuario', 'servitems','servitems_seccion','servitems_edit'));
    }

    public function edit($id)
    {
        $servitem = ServItem::find($id);
        $usuario = Auth::user();
        $servitems_seccion = 'active';
        $servitems_edit = 'active';

        return view('adm.servitems.editarServItem', compact('servitem','usuario','servitems_seccion','servitems_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'servitems');
        $file_save ? $datos['imagen'] = $file_save : false;

        $servitem = ServItem::find($id);
        $servitem->fill($datos);
        $servitem->save();
        $success = 'Servicio editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $servitem = ServItem::find($id);
        $servitem->delete();
        $success = 'Servicio eliminado correctamente';
        return back()->with('success', $success);
    }
}
