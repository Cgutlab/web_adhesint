<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use App\Cliente;

class ClienteController extends Controller
{
    public function create()
    {
        $usuario = Auth::user();
        $clientes_seccion = 'active';
        $clientes_create = 'active';

        return view('adm.clientes.crearCliente', compact('usuario','clientes_seccion','clientes_create'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'clientes');
        $file_save ? $datos['imagen'] = $file_save : false;

        Cliente::create($datos);
        $success = 'Cliente creado correctamente';
        return back()->with('success', $success);
    }

    public function show()
    {
        $usuario = Auth::user();
        $clientes = Cliente::all();
        $clientes_seccion = 'active';
        $clientes_edit = 'active';
        $clientes = Cliente::paginate(8);
       
        return view('adm.clientes.editarClientes', compact('usuario', 'clientes','clientes_seccion','clientes_edit'));
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $usuario = Auth::user();
        $clientes_seccion = 'active';
        $clientes_edit = 'active';

        return view('adm.clientes.editarCliente', compact('cliente','usuario','clientes_seccion','clientes_edit'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'clientes');
        $file_save ? $datos['imagen'] = $file_save : false;

        $cliente = Cliente::find($id);
        $cliente->fill($datos);
        $cliente->save();
        $success = 'Cliente editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        $success = 'Cliente eliminado correctamente';
        return back()->with('success', $success);
    }
}
