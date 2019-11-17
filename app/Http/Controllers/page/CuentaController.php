<?php

namespace App\Http\Controllers\page;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Requests\CuentasRequest;
use Illuminate\Html;
use App\Cuenta;

class CuentaController extends Controller
{
    //
    public function createCuenta()
    {
        $cuentas_seccion = 'active';
        $cuentas_create = 'active';
        $active='cuenta';
        return view('page.crearCuenta', compact('cuentas_seccion','cuentas_create','active'));
    }

    public function storeCuenta(CuentasRequest $request)
    {
        $datos = $request->all();

        Cuenta::create($datos);
        $success = 'Cuenta creado correctamente';

        return back()->with('success', $success);
    }

    public function recuperarCuenta()
    {
        $cuentas_seccion = 'active';
        $cuentas_create = 'active';
        $active='cuenta';

        return view('page.sendCuenta', compact('cuentas_seccion','cuentas_create','active'));
    }

    public function sendCuenta(Request $request)
    { 
        if($request->email != '')
        {
            $success = 'Correo enviado';
        }

        return back()->with('success', $success);
    }




/*

    function logout()
    {
        session()->forget('cliente');
        session()->forget('tipo');

        return redirect('zona');
    }

    function ingresar(Request $request)
    {
        $cliente = DB::table('clientes')->where('usuario', $request->input('usuario'))->first();
        if(isset($cliente))
        {
            if($cliente->contrasenia == $request->input('contrasenia'))
            {
                if($cliente->habilitado==0)
                {
                    $error = "Su usuario debe ser dado de alta por el administrador. Contactese con el mismo.";
                    return view('zona', compact('error'));
                }
                else
                {
                    session(['cliente' => $cliente->id]);
                    session(['tipo' => $cliente->tipo]);
                    return redirect('catalogo');
                }
            }
            else
            {
                $error = "El usuario y/o contraseña son invalidos";
                return view('zona', compact('error'));
            }
        }
        else
        {
            $error = "El usuario y/o contraseña son invalidos";
            return view('zona', compact('error'));
        }
    }

    public function registrar(Request $request)
    {
        $datos = $request->all();

        Cliente::create($datos);
        $success = 'Se ha registrado correctamente';

        return back()->with('success', $success);
    }

    function crearCliente()
    {
        return view('adm.clientes.cliente.create',compact('section'));
    }

    function listarClientes()
    {
        $clientes = Cliente::all();

        return view('adm.clientes.cliente.list',  compact('clientes'));
    }

    function editarCliente($id)
    {
        $cliente = Cliente::find($id);

        return view('adm.clientes.cliente.edit', compact('cliente'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        Cliente::create($datos);
        $success = 'Cliente creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $datos = $request->all();
        
        $cliente->fill($datos);
        $cliente->save();
        $success = 'Cliente editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        $success = 'Cliente eliminado correctamente';
        return back()->with('success', $success);
    }
*/
}
