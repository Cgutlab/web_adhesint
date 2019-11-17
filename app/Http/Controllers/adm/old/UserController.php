<?php

namespace App\Http\Controllers\adm;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\User;
use Redirect;

class UserController extends Controller
{

    public function index(){
        $users = User::paginate(8);
        $usuario = Auth::user();
        $usuarios_seccion = 'active';
        $usuarios_edit = 'active';
        return view('adm.usuarios.editarUsuarios', compact('users','usuario','usuarios_seccion','usuarios_edit'));
    }

    public function create(){
        $usuario = Auth::user();
        $usuarios_seccion = 'active';
        $usuarios_create = 'active';
        return view('adm.usuarios.crearUsuario',compact('usuario','usuarios_seccion','usuarios_create'));
    }

    public function login(){
        return view('adm.login');
    }

    public function store(UserRequest $request){

        /*$usuario = new User ($request->all());*/
        $usuario = new User();
        $usuario->user         = $request->user;
        $usuario->firstname    = $request->firstname;
        $usuario->lastname     = $request->lastname;
        $usuario->address      = $request->address;
        $usuario->email        = $request->email;
        $usuario->phone        = $request->phone;
        $usuario->password=\ Hash::make($request->password);
        $success = 'Usuario creado correctamente';
        $usuario->save();
        return back()->with('success', $success);

    }

    public function edit($id){
        $user = User::find($id);
        $usuario = Auth::user();
        $usuarios_seccion = 'active';
        $usuarios_edit = 'active';
        return view('adm.usuarios.editarUsuario', compact('user','usuario','usuarios_seccion','usuarios_edit'));
    }

    public function update(UserRequest $request, $id){
        $usuario = User::find($id);
        $usuario->user         = $request->user;
        $usuario->firstname    = $request->firstname;
        $usuario->lastname     = $request->lastname;
        $usuario->address      = $request->address;
        $usuario->email        = $request->email;
        $usuario->phone        = $request->phone;
        if($request->password){
            $usuario->password= \Hash::make($request->password);
        }

        $usuario->save();
        $success = 'Usuario editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        $success = 'Usuario eliminado correctamente';
        return Redirect::to('adm/usuarios')->with('success', $success);
    }
}
